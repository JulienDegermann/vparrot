<?php

function stringToArray (string $string) {
  return explode(PHP_EOL, $string);
}

// Comments on index.php
if (isset($_POST['new_comment'])) {
  $note = isset($_POST['note']) ? htmlentities(intval($_POST['note'])) : null;
  $first_name = htmlentities(trim(ucwords(strtolower($_POST['first_name']))));
  $last_name = htmlentities(trim(ucwords(strtolower($_POST['last_name']))));
  $comment = htmlentities(trim($_POST['comment']));

  if (!$note || !$first_name || !$last_name || !$comment) {
    $errors[] = 'Un champ est manquant';
  } else {
    $user = get_user_by_full_name($bdd, $first_name, $last_name);
    if (!$user) {
      $user = add_user($bdd, $first_name, $last_name, 'client', null, null, null);
      $id = $bdd->lastInsertId();
    } else {
      $id = $user['id'];
    }
    $new_comment = new_comment($bdd, $id, $note, $comment);
    if ($new_comment) {
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
    $first_name = htmlentities(ucfirst(strtolower(trim($_POST['first_name']))));
    $last_name = htmlentities(ucwords(strtolower(trim($_POST['last_name']))));
    $email = htmlentities(strtolower(trim($_POST['email'])));
    $tel = htmlentities($_POST['tel']);
    $content = htmlentities(trim($_POST['message']));
    $title = $_POST['title'] != '' ? htmlentities($_POST['title']) : null;

    if (!$first_name || !$last_name || !$email || !$tel || !$content) {
      $errors[] = 'Un champ est manquant';
    } elseif (!intval($tel)) {
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
  $current_email = htmlentities($_POST['email']);
  $current_password = htmlentities($_POST['password']);
  if (!$current_email || !$current_password) {
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
  $employee_first_name = htmlentities(ucfirst(trim($_POST['employee_first_name'])));
  $employee_last_name = htmlentities(ucfirst(trim($_POST['employee_last_name'])));
  $employee_password = htmlentities(password_hash($_POST['employee_password'], PASSWORD_DEFAULT));
  $employee_email = htmlentities(strtolower($employee_first_name .  '.' . str_replace(' ', '-', $employee_last_name) . '@example.com'));

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
  $brand = htmlentities($_POST['brand']);
  $model = htmlentities(strval($_POST['model']));
  $year = htmlentities($_POST['year']);
  $mileage = htmlentities($_POST['mileage']);
  $price = htmlentities($_POST['price']);
  $energy = htmlentities($_POST['energy']);
  $main_picture = htmlentities($_FILES['main_picture']['tmp_name']);
  if ($main_picture) {
    if (getimagesize($main_picture)) {
      $file_name = slugify((uniqid() . '-' . $_FILES['main_picture']['name']));
      move_uploaded_file($main_picture, 'uploads/images/' . $file_name);
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
    } else {
      $errors[] = 'Le fichier envoyé n\'est pas une image';
    }
  }
  $active = 'cars';
}

// get delete or modify for messages, comments, employees
if (isset($_GET['admin'])) {
  $get = htmlentities($_GET['admin']);
  $get2 = explode('-', $get)[2];
  $id = intval(explode('-', $get)[2]);
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

// update garage informations
if (isset($_POST['update_info'])) {
  // garage infos
  $company_name = htmlentities(trim($_POST['company_name']));
  $company_tel = htmlentities(trim($_POST['company_tel']));
  $company_email = htmlentities(trim($_POST['company_email']));
  $street_number = htmlentities(trim($_POST['street_number']));
  $street_name = htmlentities(trim($_POST['street_name']));
  $city = htmlentities(trim($_POST['city']));
  $zip_code = intval(htmlentities(trim($_POST['zip_code'])));

  $update_company = update_company_informations(
    $bdd,
    $company_email,
    $company_name,
    $company_tel,
    $city,
    $street_number,
    $street_name,
    $zip_code
  );
  if ($update_company) {
    $infos[] = 'Les informations ont été mises à jour.';
  } else {
    $errors[] = 'Une erreur est survenue, veuillez réessayer.';
  }


  // openings
  for ($i = 1; $i < 8; $i++) {
    $name1 = 'am_opening_' . $i;
    $name2 = 'am_closure_' . $i;
    $name3 = 'pm_opening_' . $i;
    $name4 = 'pm_closure_' . $i;

    $$name1 = $_POST['am_opening_' . $i];
    $$name2 = $_POST['am_closure_' . $i];
    $$name3 = $_POST['pm_opening_' . $i];
    $$name4 = $_POST['pm_closure_' . $i];

    update_openings($bdd, $i, $$name1, $$name2, $$name3, $$name4);
  }

  $services2 = [
    [
      'title' => $_POST['service_title_1'],
      'content' => $_POST['service_content_1']
    ],
    [
      'title' => $_POST['service_title_2'],
      'content' => $_POST['service_content_2']
    ],
    [
      'title' => $_POST['service_title_3'],
      'content' => $_POST['service_content_3']
    ]
  ];

  foreach ($services2 as $key => $service2) {
    update_services($bdd, $key + 1, $service2['title'], $service2['content']);
  }
}
