<?php
session_start();
if (isset($_SESSION['last_activity']) && ((time() - $_SESSION['last_activity']) > 15 * 60)) {
  session_unset();
  session_destroy();
  header('Location: login.php');
} else {
  $_SESSION['last_activity'] = time();
}

if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'employee') {
} else {
  header('Location: login.php');
  exit();
}

$_SESSION['last_activity'] = time();
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > (15 * 60))) {
  session_destroy();
} else {
  $_SESSION['last_activity'] = time();
}

$current_page = 'admin';

require_once 'data_base/data_base_connect.php';
require_once 'lib/cars_list.php';
require_once 'lib/workshop_datas.php';
require_once 'lib/users.php';
require 'classes/class_users.php';
require 'classes/class_comments.php';
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

  <title>Garage Vincent Parrot : Admin</title>
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
        <button type="button" class="menu">
          <?php include 'assets/images/icons/menu.svg'; ?>
        </button>
      </div>
    </div>
    <div class="logout">
      <p>Bonjour <?= $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']; ?></p>
      <button id="logout" type="button" class="button">Se déconnecter</button>
    </div>
  </header>
  <!------------------------------------------------------------- HEADER END -->

  <!------------------------------------------------------------- MAIN START -->
  <main>
    <!-- ----------------------------------------------------------- HEADER CALL -->
    <section class="mobile_only">
      <h1>ERREUR</h1>
      <p>Cette page est conçu pour être affichée sur un écran plus grand. Veuillez-vous connecter sur une tablette ou un ordinateur</p>
    </section>
    <section id="section-1" class="desktop_only">
      <div class="container">
        <div class="row">
          <aside class="bloc-4">
            <nav class="admin-nav">
              <!-- if is admin -> display admin functions -->
              <?php if ($_SESSION['role'] === 'admin') { ?>
                <ul class="admin">
                  <li id="garage" class="active">Informations sur le garage</li>
                  <li id="employee">Comptes employé</li>
                </ul>
              <?php
              } ?>
              <ul>
                <li id="messages">Messages clients</li>
                <li id="comments">Commentaires clients</li>
                <li id="cars">Véhicules d'occasion</li>
              </ul>
            </nav>
          </aside>
          <article class="bloc-3-4 garage" id="display">
            <!-- ------------------------------------------- GARAGE INFORMATIONS -->
            <div class="garage">
              <h1>Informations générales</h1>
              <form action="config/admin_config.php" method="post">
                <fieldset>
                  <label for="company_name">Nom établissement :
                    <input type="text" name="company_name" id="company_name" value="<?php if (isset($_POST['company_name'])) {
                                                                                      echo $_POST['company_name'];
                                                                                    } ?>">
                  </label>
                  <label for="company_tel">Téléphone :
                    <input type="tel" name="company_tel" maxlength="10" minlength="10" id="company_tel" value="<?= $phone; ?>">
                  </label>
                  <label for="company_email">E-mail :
                    <input type="email" name="company_email" id="company_email" value="<?= $email; ?>">
                  </label>
                </fieldset>
                <fieldset>
                  <legend>Adresse</legend>
                  <label for="street_number">N° de rue :
                    <input type="number" name="street_number" id="street_number" value="<?= $address_input['street_number']; ?>">
                  </label>
                  <label for="street_name">Rue :
                    <input type="text" name="street_name" id="street_name" value="<?= $address_input['street_name']; ?>">
                  </label>

                  <label for="city">Ville :
                    <input type="text" name="city" id="city" value="<?= $address_input['city']; ?>">
                  </label>
                  <label for="zip_code">Code postal :
                    <input type="number" name="zip_code" id="zip_code" value="<?= $address_input['zip_code']; ?>">
                  </label>
                </fieldset>
                <input class="button" type="submit" value="Enregistrer">
              </form>
            </div>
            <!-- --------------------------------------------------------------- -->

            <!-- --------------------------------------------- EMPLOYEES ACCOUNT -->
            <div class="employee">
              <h1>Comptes employés</h1>
              <div>
                <h2>Créer un compte employé</h2>
                <form action="config/admin_config.php" method="post">
                  <fieldset>
                    <label for="employee_first_name">Prénom :
                      <input type="text" name="employee_first_name" id="employee_first_name">
                    </label>
                    <label for="employee_last_name">Nom :
                      <input type="text" name="employee_last_name" id="employee_last_name">
                    </label>
                    <label for="employee_password">Mot de passe :
                      <input type="password" name="employee_password" id="employee_password">
                    </label>
                  </fieldset>
                  <input class="button" type="submit" value="Enregistrer">
                  <?php
                  if (
                    isset($_POST['first_name']) &&
                    isset($_POST['last_name']) &&
                    isset($_POST['password']) &&
                    $_POST['first_name'] != '' &&
                    $_POST['last_name'] != '' &&
                    $_POST['password'] != ''
                  ) {
                    var_dump('nom ' . $_POST['first_name'] . ' ' . $_POST['last_name'] . ' ' . $_POST['password']);
                    $users['employee'][] = [
                      'id' => uniqid(),
                      'last_name' => $_POST['last_name'],
                      'first_name' => $_POST['first_name'],
                      'password' => $_POST['password'],
                      'function' => 'employee',
                      'email' => strtolower($_POST['first_name'] . '.' . $_POST['last_name'] . '@example.com')
                    ];
                  } else {
                    var_dump('un champ requis est manquant');
                  }
                  ?>
                </form>
              </div>
              <div>
                <h2>Liste des employés</h2>
                <table>
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th class="desktop_only">E-mail</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $employee_bdd = "SELECT * FROM users WHERE role='employee'";
                    foreach ($bdd->query($employee_bdd) as $employee) {
                      var_dump($employee['first_name']);
                      $userObject = new Users($employee['id'], $employee['first_name'], $employee['last_name'], $employee['email'], $employee['key'] = 0);
                      $userObject->display_list();
                      $bdd = null;
                    }

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- --------------------------------------------------------------- -->

            <!-- ----------------------------------------------- CLIENT MESSAGES -->
            <div class="messages">
              <h1>Formulaires contact</h1>
              <table>
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>E-mail</th>
                    <th>Ojbet</th>
                    <th>Message</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($users['client'] as $user) {

                  ?>
                    <tr>
                      <td><?= $user['last_name']; ?></td>
                      <td><?= $user['first_name']; ?></td>
                      <td><?= $user['email']; ?></td>
                      <!-- add filled icon on :hover : JS mouseenter -->
                      <td><?= $user['messages']['title']; ?></td>
                      <td><?= $user['messages']['content']; ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- --------------------------------------------------------------- -->

            <!-- ----------------------------------------------- CLIENT COMMENTS READY DB -->
            <div class="comments">
              <h1>Avis clients</h1>
              <table>
                <thead>
                  <tr>
                    <th>Prénom</th>

                    <th>Note</th>
                    <th>Commentaire</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($users['client'] as $user) {
                    $current_comment = new Comments($user['id'], $user['first_name'], $user['note']['note'], $user['note']['comment']);
                    $current_comment->display_list();
                  }
                  ?>

                </tbody>

              </table>
            </div>
            <!-- --------------------------------------------------------------- -->

            <!-- ------------------------------------------------------ CARS ADS -->
            <div class="cars">
              <h1>Véhicules d'occasion</h1>

              <div>
                <h2>Ajouter un véhicule</h2>
                <form action="admin_config" method="post" enctype="multipart/form-data">
                  <fieldset>
                    <label for="brand">Marque :
                      <input type="text" name="brand" id="brand">
                    </label>
                    <label for="model">Modèle :
                      <input type="text" name="model" id="model">
                    </label>
                    <label for="year">Année :
                      <input type="number" name="year" id="year">
                    </label>
                    <label for="mileage">Kimométrage :
                      <input type="number" name="mileage" id="mileage">
                    </label>
                    <label for="price">Prix :
                      <input type="number" name="price" id="price">
                    </label>
                    <label for="main_picture">Photo principale :
                      <input type="file" name="main_picture" id="main_picture" accept="image/jpeg, image/jpg, image/png">
                    </label>
                  </fieldset>
                  <input class="button" type="submit" value="Enregistrer">
                </form>
              </div>
              <div>
                <h2>Liste des véhicules</h2>
                <table>
                  <thead>
                    <tr>
                      <th>Marque</th>
                      <th>Modèle</th>
                      <th>Année</th>
                      <th>Kilométrage</th>
                      <th>Prix</th>
                      <th>Photo principale</th>
                      <th>Autres photos</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($cars as $key => $car) {
                    ?>
                      <tr>
                        <td><?= $car['brand']; ?></td>
                        <td><?= $car['model']; ?></td>
                        <td><?= $car['year']; ?></td>
                        <td><?= $car['mileage']; ?> kms</td>
                        <td><?= $car['price']; ?> €</td>
                        <td>Photo 1</td>
                        <td>Photos</td>
                        <!-- add filled icon on :hover : JS mouseenter -->
                        <td class="center"><?php require 'assets/images/icons/edit.svg' ?>
                          <?php require 'assets/images/icons/delete.svg' ?></td>
                      </tr>
                    <?php
                    }
                    ?>

                  </tbody>

                </table>
              </div>
            </div>
            <!-- --------------------------------------------------------------- -->
          </article>
        </div>
      </div>
    </section>

    <!-- ----------------------------------------------------------- FOOTER CALL -->

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