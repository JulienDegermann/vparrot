<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<?php
session_start();
$errors = [];
$infos = [];

require_once 'data_base/data_base_connect.php';
require_once 'classes/class_users.php';
require_once 'config/config.php';

?>

<!-- PAGE NAME -->
<?php $current_page = 'login'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- ------------------------------------------------------------- FAVICON -->
  <link rel="icon" type="image/x-icon" href="assets/images/favicons/favicon.ico">

  <!-- ----------------------------------------------------------------- CEO -->
  <meta name="description" content="Le garage V.Parrot vous accueille à Toulouse 6 jours sur 7 15 annnées d'expertise dans la réparation et l'entretien de votre véhicule" />

  <!-- -------------------------------------------------------------- STYLES -->
  <!-- SLICK CSS -->
  <link rel="stylesheet" type="text/css" href="assets/js/slick-1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="assets/js/slick-1.8.1/slick/slick-theme.css" />

  <!-- CUSTOM CSS -->
  <!-- PAGE SPECEFIC CSS -->
  <link rel="stylesheet" href="assets/css/index.css">
  <link rel="stylesheet" href="assets/css/<?= $current_page ?>.css">
  <?php if ($current_page == 'used_car') : echo ('<link rel="stylesheet" href="/assets/css/contact_form.css">');
  endif ?>

  <title><?= ucfirst($current_page); ?> - Garage Vincent Parrot</title>
</head>
<body>
  <!------------------------------------------------------------ HEADER START-->
  <header>
    <div class="container">
      <div class="row">
        <a href="index.php" class="logo-parrot">
          <img src="assets/images/pictures/v_parrot_logo.png" alt="logo Vincent Parrot garage">
          <p>V.PARROT <br> automobile</p>
          <!-- <p>Mécanique</p> -->
        </a>
        <!-- <button type="button" class="menu">
          <img src="assets/images/icons/menu.svg" alt="burger menu icon">
        </button> -->
      </div>
    </div>
  </header>
  <!------------------------------------------------------------- HEADER END -->

  <!------------------------------------------------------------- MAIN START -->
  <main>
  <?php include 'templates/infos_errors.php'; ?>

  </div>
    <section id="section-1">
      <div class="container">
        <div class="row">
          <h1>Connexion</h1>
          <!-- <form action="config/admin_employee_config.php" method="post"> -->
          <form method="post">
            <label for="email">
              <input type="email" name="email" id="email" placeholder="Votre email" required>
            </label>
            <label for="password">
              <input type="password" name="password" id="password" placeholder="Votre mot de passe" required>
            </label>
            <!-- <label for="passord_memory" class="tos">
              <input type="checkbox" id="passord_memory" name="passord_memory">
              Mémorier la connexion
            </label> -->
            <?php
            if (isset($_SESSION['error']) && $_SESSION['error'] != '') {
            ?>
              <p class="error"><?= $_SESSION['error']; ?></p>
            <?php
            }
            ?>
            <input class="button" type="submit" value="Se connecter" name="connect">
          </form>
        </div>
      </div>
    </section>
    </main>
  <!----------------------------------------------------------------- MAIN END -->
  <!------------------------------------------------------------- FOOTER START -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="copyrights">
          <p>
            <a href="legal_notice.php">mentions légales</a> -
            <a href="privacy_policy.php">politique de confidentialité</a> -
            &copy; Julien Degermann 2023
          </p>
        </div>


      </div>
    </div>
  </footer>
  <!--------------------------------------------------------------- FOOTER END -->
  <!------------------------------------------------------------ SCRIPTS CALLS -->
  <!-- jQuery -->
  <script src="assets/js/jQuery_v3.7.0.js"></script>

  <!-- Slick JS (sliders) -->
  <script type="text/javascript" src="assets/js/slick-1.8.1/slick/slick.min.js"></script>
  <!--  -->
  <script src="assets/js/index.js"></script>
  <!-- page scpecific JS -->
  <?php
  if (file_exists("assets/js/$current_page.js")) :
    echo '<script src="assets/js/' . $current_page . '.js"></script>';
  endif;
  ?>

</body>

</html>