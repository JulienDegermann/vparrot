<?php
// DB
require_once 'data_base/data_base_connect.php';
require_once 'config/config.php';
require_once 'classes/class_company.php';
$company = get_all_informations($bdd);

// SESSION
ini_set('session.save_path', 'session_files/');
session_start();
if(!isset($_SESSION['user']['role'])) {
  $_SESSION['user']['role'] = 'client';
}
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 60 * 15)) {
  session_unset();
  session_destroy();
} else {
  $_SESSION['last_activity'] = time();
}

$errors = [];
$infos = [];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- ------------------------------------------------------------- FAVICON -->
  <link rel="icon" type="image/x-icon" href="assets/images/favicons/favicon.ico">

  <!-- ----------------------------------------------------------------- CEO -->
  <meta name="description" content="Le garage V.Parrot vous accueille à Toulouse 6 jours sur 7 et propose ses 15 années
  d'expertise dans la réparation et l'entretien de votre véhicule" />

  <!-- -------------------------------------------------------------- STYLES -->
  <!-- SLICK CSS -->
  <link rel="stylesheet" type="text/css" href="assets/js/slick-1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="assets/js/slick-1.8.1/slick/slick-theme.css" />

  <!-- CUSTOM CSS -->
  <!-- PAGE SPECEFIC CSS -->
  <link rel="stylesheet" href="assets/css/index.css">
  <link rel="stylesheet" href="assets/css/<?php echo $current_page ?>.css">
  <?php if ($current_page == 'used_car') : echo ('<link rel="stylesheet" href="assets/css/contact_form.css">');
  endif ?>

  <title><?= ucfirst($current_pageFR); ?> - Garage Vincent Parrot</title>
</head>

<body> <!------------------------------------------------------------ HEADER START-->
  <header>
    <div class="container">
      <div class="row">
        <a href="index.php" class="logo-parrot">
          <img src="assets/images/pictures/v_parrot_logo.png" alt="logo Vincent Parrot garage">
          <p>V.PARROT <br> automobile</p>
          <!-- <p>Mécanique</p> -->
        </a>
        <nav class="header-nav hidden">
          <ul>
            <li>
              <a href="index.php" class="header-nav-link">
                <p>Accueil</p>
              </a>
            </li>
            <li>
              <a href="used_cars.php" class="header-nav-link">
                <p>Occasions</p>
              </a>
            </li>
            <li>
              <a href="contact.php" class="header-nav-link">
                <p>Contact</p>
              </a>
            </li>
          </ul>

        </nav>
        <button type="button" class="menu">
          <?php require_once 'assets/images/icons/menu.svg'; ?>
        </button>
      </div>
    </div>
  </header>
  <!------------------------------------------------------------- HEADER END -->

  <!------------------------------------------------------------- MAIN START -->
  <main>
