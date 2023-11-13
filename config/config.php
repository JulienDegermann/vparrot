<?php

// Comments on index.php
if (isset($_POST['new_comment'])) {

  $note = isset($_POST['note']) ? intval($_POST['note']) : null;
  $first_name = isset($_POST['first_name']) ? trim(ucwords(strtolower($_POST['first_name']))) : null;
  $last_name = isset($_POST['last_name']) ? trim(ucwords(strtolower($_POST['last_name']))) : null;
  $comment = isset($_POST['comment']) ? trim($_POST['comment']) : null;

  if (!$note || !$first_name || !$last_name || !$comment) {
    $errors[] = 'Un champ est manquant';
  } elseif (
    !preg_match(_FIRST_NAME_REGEX_, $first_name) ||
    !preg_match(_LAST_NAME_REGEX_, $last_name) ||
    !preg_match(_COMMENT_REGEX_, $comment) ||
    !preg_match(_NOTE_REGEX_, $note)
  ) {
    $errors[] = 'Un champ n\'est pas correctement complété';
  } else {
    $note = htmlentities($note, ENT_QUOTES, 'UTF-8');
    $first_name = htmlentities(trim(ucwords(strtolower($_POST['first_name']))), ENT_QUOTES, 'UTF-8');
    $last_name = htmlentities(trim(ucwords(strtolower($_POST['last_name']))), ENT_QUOTES, 'UTF-8');
    $comment = htmlentities(trim($_POST['comment']), ENT_QUOTES, 'UTF-8');

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

    //  get input values
    $first_name = isset($_POST['first_name']) ? ucfirst(strtolower(trim($_POST['first_name']))) : null;
    $last_name = isset($_POST['last_name']) ? ucwords(strtolower(trim($_POST['last_name']))) : null;
    $email = isset($_POST['email']) ? strtolower(trim($_POST['email'])) : null;
    $tel = isset($_POST['tel']) ? $_POST['tel'] : null;
    $content = isset($_POST['message']) ? trim($_POST['message']) : null;
    $title = isset($_POST['title']) ? $_POST['title'] : null;

    // check if inputs completed
    if (!$first_name || !$last_name || !$email || !$tel || !$content) {
      $errors[] = 'Un champ est manquant';
    } elseif (!ctype_digit($tel) || strlen($tel) != 10 || !preg_match(_PHONE_REGEX_, $tel)) {
      $errors[] = 'Le numéro de téléphone n\'est pas valide';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match(_MAIL_REGEX_, $email)) {
      $errors[] = 'L\'email n\'est pas valide.';
    } elseif (
      !preg_match(_FIRST_NAME_REGEX_, $first_name) ||
      !preg_match(_LAST_NAME_REGEX_, $last_name) ||
      !preg_match(_MESSAGE_REGEX_, $content)
    ) {
      $errors[] = 'Un champ n\'est pas correctement complété';
    } else {

      // XSS protection
      $first_name = htmlentities($first_name, ENT_QUOTES, 'UTF-8');
      $last_name = htmlentities($last_name, ENT_QUOTES, 'UTF-8');
      $email = htmlentities($email, ENT_QUOTES, 'UTF-8');
      $tel = htmlentities($tel, ENT_QUOTES, 'UTF-8');
      $content = htmlentities($content, ENT_QUOTES, 'UTF-8');
      $title = htmlentities($title, ENT_QUOTES, 'UTF-8');

      // search user, new user if necessary
      $user = get_user_by_full_name($bdd, $first_name, $last_name);
      if (!$user) {
        add_user($bdd, $first_name, $last_name, 'client', $email, $tel);
        $user = get_user_by_full_name($bdd, $first_name, $last_name);
      }
      $user_id = $user['id'];

      // new message linked to user
      insert_message($bdd, $user_id, $content, $title);
      $infos[] = 'Le message a bien été envoyé';
    }
  } else {
    $errors[] = 'Vous n\'avez pas accepté les conditions générales d\'utilisation';
  }
}

// Admin panel connexion
if (isset($_POST['connect'])) {
  $current_email = $_POST['email'] ? $_POST['email'] : null;
  $current_password = $_POST['password'] ? $_POST['password'] : null;
  if (!$current_email || !$current_password) {
    $errors[] = 'Identifiant ou mot de passe incorrect';
  } elseif (
    !filter_var($current_email, FILTER_VALIDATE_EMAIL) ||
    !preg_match(_MAIL_REGEX_, $current_email) ||
    !preg_match(_PWD_REGEX_, $current_password)
  ) {
    $errors[] = 'Identifiant ou mot de passe incorrect';
  } else {
    $current_email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
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

  // get inputs values
  $employee_first_name = isset($_POST['employee_first_name']) ? ucwords(trim($_POST['employee_first_name'])) : null;
  $employee_last_name = isset($_POST['employee_last_name']) ? ucwords(trim($_POST['employee_last_name'])) : null;
  $employee_password = isset($_POST['employee_password']) ? $_POST['employee_password'] : null;

  // check good completion and regex matches
  if (!$employee_first_name || !$employee_last_name || !$employee_password) {
    $errors[] = 'Un champ requis est manquant';
  } elseif (
    !preg_match(_FIRST_NAME_REGEX_, $employee_first_name) ||
    !preg_match(_LAST_NAME_REGEX_, $employee_last_name)
  ) {
    $errors[] = 'Un champ n\'est pas correctement complété';
  } elseif (!preg_match(_PWD_REGEX_, $employee_password)) {
    $errors[] = 'Le mot de passe n\'est pas sécurisé';
  } else {
    // create email
    $employee_email = htmlentities((slugify($employee_first_name) .  '.' . slugify($employee_last_name) . '@example.com'), ENT_QUOTES, 'UTF-8');

    // SECURITY : prevent XSS and hash password
    $employee_first_name = htmlentities($employee_first_name, ENT_QUOTES, 'UTF-8');
    $employee_last_name = htmlentities($employee_last_name, ENT_QUOTES, 'UTF-8');
    $employee_password_hashed = password_hash($employee_password, PASSWORD_DEFAULT);
    $user = get_user_by_full_name($bdd, $employee_first_name, $employee_last_name);

    // check if user exist before insert
    if ($user && $user['role'] === 'employee') {
      $errors[] = 'Le compte existe déjà';
    } else {
      add_user($bdd, $employee_first_name, $employee_last_name, 'employee', $employee_email, null, $employee_password_hashed);
      $infos[] = 'Nouveau compte créé';
    }
  }
  $active = 'employees';
}

// add car
if (isset($_POST['new_car'])) {
  $brand = isset($_POST['brand']) ? $_POST['brand'] : null;
  $model = isset($_POST['model']) ? strval($_POST['model']) : null;
  $year = isset($_POST['year']) ? intval($_POST['year']) : null;
  $mileage = isset($_POST['mileage']) ? intval($_POST['mileage']) : null;
  $price = isset($_POST['price']) ? intval($_POST['price']) : null;
  $energy = isset($_POST['energy']) ? $_POST['energy'] : null;
  $main_picture = isset($_FILES['main_picture']) ? $_FILES['main_picture'] : null;

  if (!$brand || !$model || !$year || !$mileage || !$price || !$energy || !$main_picture) {
    $errors[] = 'Un champ est manquant';
  } elseif (
    !preg_match(_BRAND_REGEX_, $brand) ||
    !preg_match(_MODEL_REGEX_, $model) ||
    !preg_match(_YEAR_REGEX_, $year) ||
    !preg_match(_MILEAGE_REGEX_, $mileage) ||
    !preg_match(_MILEAGE_REGEX_, $price) ||
    !preg_match(_BRAND_REGEX_, $energy) ||
    !preg_match(_COMMENT_REGEX_, $main_picture['name'])
  ) {
    $errors[] = 'Un champ n\'est pas correctement complété';
  } elseif ((!getimagesize($main_picture['tmp_name']))) {
    $errors[] = 'Le fichier envoyé n\'est pas une image';
  } else {
    // XSS prevent
    $brand = htmlentities($brand, ENT_QUOTES, 'UTF-8');
    $model = htmlentities($model, ENT_QUOTES, 'UTF-8');
    $year = htmlentities($year, ENT_QUOTES, 'UTF-8');
    $mileage = htmlentities($mileage, ENT_QUOTES, 'UTF-8');
    $price = htmlentities($price, ENT_QUOTES, 'UTF-8');
    $energy = htmlentities($energy, ENT_QUOTES, 'UTF-8');

    // file_name normalized
    $file_name = slugify((uniqid() . '-' . $main_picture['name']));
    move_uploaded_file($main_picture['tmp_name'], 'uploads/images/' . $file_name);

    // add in database 
    $new_car = add_car($bdd, $brand, $model, $year, $mileage, $price, $energy);

    if ($new_car) {
      $car_id = $bdd->lastInsertId();
      $new_image = add_image($bdd, $file_name, $car_id);
      if ($new_image) {
        $infos[] = 'La voiture a été ajoutée avec succès';
      } else {
        $errors[] = 'Une erreur s\'est produite';
      }
    } else {
      $errors[] = 'Une erreur s\'est produite';
    }
  }
  $active = 'cars';
}




// get delete or modify for messages, comments, employees
if (isset($_GET['admin'])) {
  $get = htmlentities($_GET['admin'], ENT_QUOTES, 'UTF-8');
  $get2 = explode('-', $get)[2];
  if (!$get2) {
    header('Location: 404.php');
    exit();
  } else {
    $table = explode('-', $get)[0]; // messages, comments, employees
    $action = explode('-', $get)[1]; // delete, validate
    $id = intval(explode('-', $get)[2]);
    $active = $table;
    if ($table !== 'messages' && $table !== 'comments' && $table !== 'employees' && $table !== 'garage' && $table !== 'cars') {
      $errors[] = 'Une erreur est suvenue, veuillez essayer de nouveau';
    } else {
      switch ($table) {
        case 'messages':
          switch ($action) {
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
          switch ($action) {
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
          switch ($action) {
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
          switch ($action) {
            case 'delete':
              $delete_car = delete_car_by_id($bdd, $id);
              if ($delete_car) {
                $infos[] = 'Véhicule supprimé avec succès';
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
}

// update garage informations
if (isset($_POST['update_info'])) {


  // ---------------------------------------------------------------------------------------------- GENERAL INFORMATIONS
  // get input values
  $company_name = isset($_POST['company_name']) ? trim($_POST['company_name']) : null;
  $company_tel = isset($_POST['company_tel']) ? trim($_POST['company_tel']) : null;
  $company_email = isset($_POST['company_email']) ? trim($_POST['company_email']) : null;
  $street_number = isset($_POST['street_number']) ? trim($_POST['street_number']) : null;
  $street_name = isset($_POST['street_name']) ? trim($_POST['street_name']) : null;
  $city = isset($_POST['city']) ? trim($_POST['city']) : null;
  $zip_code = isset($_POST['zip_code']) ? intval($_POST['zip_code']) : null;

  // check good completion 
  if (!$company_name || !$company_tel || !$company_email || !$street_number || !$street_name || !$city || !$zip_code) {
    $errors[] = 'Un champ est manquant';
  } elseif (

    !preg_match(_FIRST_NAME_REGEX_, $company_name) ||
    !preg_match(_STREET_REGEX_, $street_number) ||
    !preg_match(_LAST_NAME_REGEX_, $street_name) ||
    !preg_match(_LAST_NAME_REGEX_, $city) ||
    !preg_match(_CODE_REGEX_, $zip_code)
  ) {
    $errors[] = 'Un champ n\'est pas correctement complété';
  } elseif (!preg_match(_MAIL_REGEX_, $company_email) && !filter_var($company_email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'L\'email n\'est pas valide';
  } elseif (!preg_match(_PHONE_REGEX_, $company_tel)) {
    $errors[] = 'Le numéro de téléphone n\'est pas valide';
  } else {

    // security : prevent xss
    $company_name = htmlentities($company_name, ENT_QUOTES, 'UTF-8');
    $company_tel = htmlentities($company_tel, ENT_QUOTES, 'UTF-8');
    $company_email = htmlentities($company_email, ENT_QUOTES, 'UTF-8');
    $street_number = htmlentities($street_number, ENT_QUOTES, 'UTF-8');
    $street_name = htmlentities($street_name, ENT_QUOTES, 'UTF-8');
    $city = htmlentities($city, ENT_QUOTES, 'UTF-8');
    $zip_code = htmlentities($zip_code, ENT_QUOTES, 'UTF-8');

    // update bdd
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
  }

  // ---------------------------------------------------------------------------------------------------------- OPENINGS
  // get input values
  for ($i = 1; $i < 8; $i++) {
    $name1 = 'am_opening_' . $i;
    $name2 = 'am_closure_' . $i;
    $name3 = 'pm_opening_' . $i;
    $name4 = 'pm_closure_' . $i;

    $$name1 = htmlentities(substr($_POST['am_opening_' . $i], 0, 5), ENT_QUOTES, 'UTF-8');
    $$name2 = htmlentities(substr($_POST['am_closure_' . $i], 0, 5), ENT_QUOTES, 'UTF-8');
    $$name3 = htmlentities(substr($_POST['pm_opening_' . $i], 0, 5), ENT_QUOTES, 'UTF-8');
    $$name4 = htmlentities(substr($_POST['pm_closure_' . $i], 0, 5), ENT_QUOTES, 'UTF-8');

    if (
      !preg_match(_TIME_REGEX_, $$name1) ||
      !preg_match(_TIME_REGEX_, $$name2) ||
      !preg_match(_TIME_REGEX_, $$name3) ||
      !preg_match(_TIME_REGEX_, $$name4)
    ) {
      $errors[] = 'L\'horaire n\'est pas valide';
    } else {
      update_openings($bdd, $i, $$name1, $$name2, $$name3, $$name4);
    }
  }

  // ---------------------------------------------------------------------------------------------------------- SERVICES
  // get input values

  $service_title_1 = isset($_POST['service_title_1']) ? $_POST['service_title_1'] : null;
  $service_content_1 = isset($_POST['service_content_1']) ? $_POST['service_content_1'] : null;

  $service_title_2 = isset($_POST['service_title_2']) ? $_POST['service_title_2'] : null;
  $service_content_2 = isset($_POST['service_content_2']) ? $_POST['service_content_2'] : null;

  $service_title_3 = isset($_POST['service_title_3']) ? $_POST['service_title_3'] : null;
  $service_content_3 = isset($_POST['service_content_3']) ? $_POST['service_content_3'] : null;

  if (
    !preg_match(_SERVICE_REGEX_, $service_content_1) ||
    !preg_match(_SERVICE_REGEX_, $service_content_2) ||
    !preg_match(_SERVICE_REGEX_, $service_content_3) ||
    !preg_match(_SERVICE_REGEX_, $service_title_1) ||
    !preg_match(_SERVICE_REGEX_, $service_title_2) ||
    !preg_match(_SERVICE_REGEX_, $service_title_3)
  ) {
    $errors[] = 'Un champ n\'est pas correctement complété BUG HERE';
  } else {
    $services2 = [
      [
        'title' => htmlentities($service_title_1, ENT_QUOTES, 'UTF-8'),
        'content' => htmlentities($service_content_1, ENT_QUOTES, 'UTF-8')
      ],
      [
        'title' => htmlentities($service_title_2, ENT_QUOTES, 'UTF-8'),
        'content' => htmlentities($service_content_2, ENT_QUOTES, 'UTF-8')
      ],
      [
        'title' => htmlentities($service_title_3, ENT_QUOTES, 'UTF-8'),
        'content' => htmlentities($service_content_3, ENT_QUOTES, 'UTF-8')
      ]
    ];

    foreach ($services2 as $key => $service2) {
      update_services($bdd, $key + 1, $service2['title'], $service2['content']);
    }
  }
}
