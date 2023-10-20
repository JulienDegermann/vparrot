<?php

// Comments on index.php
if (isset($_POST['new_comment'])) {
  $note = isset($_POST['note']) ? intval($_POST['note']) : null;
  $first_name = trim(ucwords(strtolower($_POST['first_name'])));
  $last_name = trim(ucwords(strtolower($_POST['last_name'])));
  $comment = trim($_POST['comment']);

  if (!$note || !$first_name || !$last_name || !$comment) {
    $errors[] = 'Un champ est manquant';
  } else {
    $user = get_user_by_full_name($bdd, $first_name, $last_name);
    if (!$user) {
      $user = add_user($bdd, $first_name, $last_name, 'client', null, null, null);
      $id = $bdd->lastInsertId();
    }
    else {
      $id = $user['id'];
    }
    $new_comment = new_comment($bdd, $id, $note, $comment);
    if($new_comment) {
      $infos[] = 'Le commentaire a bien été envoyé';
    } else {
      $errors[] = 'Une erreur s\'est produite';
    }
  }
  $active = 'comments';
}

// Messages from contact form
if (isset($_POST['send_message'])) {
  if (isset($_POST['TOS'])) {
    $first_name = ucfirst(strtolower(trim($_POST['first_name'])));
    $last_name = ucwords(strtolower(trim($_POST['last_name'])));
    $email = strtolower(trim($_POST['email']));
    $tel = $_POST['tel'];
    $content = trim($_POST['message']);
    $title = $_POST['title'] != '' ? $_POST['title'] : null;

    if (!$first_name || !$last_name || !$email || !$tel || !$content) {
      $errors[] = 'Un champ est manquant';
    } elseif (!intval($tel)){
      $errors[] = 'Le numéro de téléphone n\'est pas valide';

    } else {
      $user = get_user_by_full_name($bdd, $first_name, $last_name);
      if (!$user) {
        add_user($bdd, $first_name, $last_name, 'client', $email, $tel);
        $user = get_user_by_full_name($bdd, $first_name, $last_name);
      }
      $user_id = $user['id'];
      insert_message($bdd, $user_id, $content, $title);
      $infos[] = 'Le message a bien été envoyé';
    }
  } else {
    $errors[] = 'Vous n\'avez pas accepté les conditions générales d\'utilisation';
  }
}

// Admin panel connexion
if (isset($_POST['connect'])) {
  $current_email = $_POST['email'];
  $current_password = $_POST['password'];
  if(!$current_email || !$current_password) {
    $errors[] = 'Identifiant ou mot de passe manquant';
  } else {
    $employee = get_user_by_email($bdd, $current_email);
    if (!$employee || (!password_verify($current_password, $employee['password']))) {
      $errors[] = 'Identifiant ou mot de passe incorrect';
    } else {
      if (!$employee['role'] === 'employee' && !$employee['role'] === 'admin') {
        $errors[] = 'Un problème est survenu, veuillez contacter le gérant';
      } else {
        session_unset();
        session_destroy();
        session_start();
        $role = $employee['role'];
        $first_name = $employee['first_name'];
        $last_name = $employee['last_name'];
        $_SESSION['user'] = [
          'first_name' => $first_name,
          'last_name' => $last_name,
          'role' => $role
        ];
        header('location: admin.php');
        exit();
      }
    }
  }
}

// Create employee account
if (isset($_POST['new_employee'])) {
  $employee_first_name = ucfirst(trim($_POST['employee_first_name']));
  $employee_last_name = ucfirst(trim($_POST['employee_last_name']));
  $employee_password = password_hash($_POST['employee_password'], PASSWORD_DEFAULT);
  $employee_email = strtolower($employee_first_name .  '.' . str_replace(' ', '-', $employee_last_name) . '@example.com');

  if (!$employee_first_name || !$employee_last_name || !$employee_password || !$employee_email) {
    $errors[] = 'Un champ requis est manquant';
  } else {
    $user = get_user_by_full_name($bdd, $employee_first_name, $employee_last_name);
    if ($user) {
      $errors[] = 'Le compte existe déjà';
    } else {
      add_user($bdd, $employee_first_name, $employee_last_name, 'employee', $employee_email, null, $employee_password);
      $infos[] = 'Nouveau compte créé';
    }
  }
  $active = 'employees';
}

// add car
if (isset($_POST['new_car'])) {
  $brand = $_POST['brand'];
  $model = strval($_POST['model']);
  $year = $_POST['year'];
  $mileage = $_POST['mileage'];
  $price = $_POST['price'];
  $energy = $_POST['energy'];
  $main_picture = $_FILES['main_picture']['tmp_name'];
  if ($main_picture) {
    if (getimagesize($main_picture)) {
      $file_name = slugify((uniqid() . '-' . $_FILES['main_picture']['name']));
      move_uploaded_file($main_picture, 'uploads/images/' . $file_name);
    }
  }
  if (!$brand || !$model || !$year || !$mileage || !$price || !$energy || !$main_picture) {
    $errors[] = 'Un champ est manquant';
  } else {
    $new_car = add_car($bdd, $brand, $model, $year, $mileage, $price, $energy);
    $car_id = $bdd->lastInsertId();
    $new_image = add_image($bdd, $file_name, $car_id);
    if ($new_car) {
      $infos[] = 'La voiture a été ajoutée avec succès';
    } else {
      $errors[] = 'Une erreur s\'est produite';
    }
  }
  $active = 'cars';
}

// get delete or modify for messages, comments, employees
if (isset($_GET['admin'])) {
  $get = $_GET['admin'];
  $id = explode('-', $get)[2];
  $table = explode('-', $get)[0]; // messages, comments, employees
  $function = explode('-', $get)[1]; // delete, validate
  $active = $table;
  if ($table !== 'messages' && $table !== 'comments' && $table !== 'employees' && $table !== 'garage' && $table !== 'cars') {
    $errors[] = 'Une erreur est suvenue, veuillez essayer de nouveau';
  } else {
    switch ($table) {
      case 'messages':
        switch ($function) {
          case 'delete':
            $delete_message = delete_message_by_id($bdd, $id);
            if ($delete_message) {
              $infos[] = 'Message supprimé avec succès';
            } else {
              $errors[] = 'Une erreur s\'est produite';
            }
            break;
          default:
            return;
            break;
        }
        break;
      case 'employees':
        switch ($function) {
          case 'delete':
            $delete_user = delete_user_by_id($bdd, $id);
            if ($delete_user) {
              $infos[] = 'Compte employé supprimé avec succès';
            } else {
              $errors[] = 'Une erreur s\'est produite';
            }
            break;
          default:
            return;
            break;
        }
        break;
      case 'comments':
        switch ($function) {
          case 'delete':
            $delete_comment = delete_comment_by_id($bdd, $id);
            if ($delete_comment) {
              $infos[] = 'Commentaire supprimé avec succès';
            } else {
              $errors[] = 'Une erreur s\'est produite';
            }
            break;
          case 'validate':
            $validate_comment = validate_comment_by_id($bdd, $id);
            if ($validate_comment) {
              $infos[] = 'Commentaire validé avec succès';
            } else {
              $errors[] = 'Une erreur s\'est produite';
            }
            break;
          default:
            return;
            break;
        }
        break;
      case 'cars':
        switch ($function) {
          case 'delete':
            $delete_car = delete_car_by_id($bdd, $id);
            if ($delete_car) {
              $infos[] = 'Véhicule supprimé avec succès';
            } else {
              $errors[] = 'Une erreur s\'est produite';
            }
            break;
          case 'validate':
            $validate_comment = validate_comment_by_id($bdd, $id);
            if ($validate_comment) {
              $infos[] = 'Commentaire validé avec succès';
            } else {
              $errors[] = 'Une erreur s\'est produite';
            }
            break;
          default:
            return;
            break;
        }
        break;
    }
  }
}
