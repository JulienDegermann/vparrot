<?php
ini_set('session.save_path', 'session_files/');
session_start();
if (!isset($_SESSION['user']) || (!$_SESSION['user']['role'] === 'admin' && !$_SESSION['user']['role'] === 'employee')) {
  header('Location: login.php');
  exit();
} 
if (isset($_SESSION['last_activity']) && ((time() - $_SESSION['last_activity']) > 15 * 60)) {
  session_unset();
  session_destroy();
  header('Location: login.php');
} else {
  $_SESSION['last_activity'] = time();
}

$current_page = 'admin';

require_once 'data_base/data_base_connect.php';
require_once 'lib/functions.php';

$errors = [];
$infos = [];

$active = $_SESSION['user']['role'] === 'admin' ? 'garage' : 'messages';
require 'classes/class_users.php';
require 'classes/class_comments.php';
require 'classes/class_messages.php';
require 'classes/class_cars.php';
require 'config/config.php';
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

  <title><?= ucfirst($current_page); ?> - Garage Vincent Parrot</title>
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
        <!-- <button type="button" class="menu">
          <? //php include 'assets/images/icons/menu.svg'; 
          ?>
        </button> -->
        <div class="logout">
          <p>Bonjour <?= $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']; ?></p>
          <button id="logout" type="button" class="button">Se déconnecter</button>
        </div>
      </div>
    </div>
  </header>


  <!------------------------------------------------------------- HEADER END -->

  <!------------------------------------------------------------- MAIN START -->
  <main>
    <?php include 'templates/infos_errors.php'; ?>
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
              <?php if ($_SESSION['user']['role'] === 'admin') { ?>
                <ul class="admin">
                  <li id="garage" class="<?= $active === 'garage' ? 'active' : ''; ?>">Informations sur le garage</li>
                  <li id="employees" class="<?= $active === 'employees' ? 'active' : ''; ?>">Comptes employé</li>
                </ul>
              <?php } ?>
              <ul>
                <?php if (isset($active)) {
                } ?>
                <li id="messages" class="<?= $active === 'messages' ? 'active' : ''; ?>">Messages clients</li>
                <li id="comments" class="<?= $active === 'comments' ? 'active' : ''; ?>">Commentaires clients</li>
                <li id="cars" class="<?= $active === 'cars' ? 'active' : ''; ?>">Véhicules d'occasion</li>
              </ul>
            </nav>
          </aside>
          <!-- garage -->
          <article class="bloc-3-4 <?= $active; ?>" id="display">
            <!-- ------------------------------------------- GARAGE INFORMATIONS -->
            <div class="garage">
              <h1>Informations générales</h1>
              <form action="config/admin_company_config.php" method="post">
                <?php
                $req = " SELECT * FROM company JOIN address ON company.address_id = address.id;";
                foreach ($bdd->query($req) as $company) { ?>
                  <fieldset>
                    <legend>Entreprise : </legend>
                    <label for="company_name">Nom :
                      <input type="text" name="company_name" id="company_name" value="<?= $company['name']; ?>">
                    </label>
                    <label for="company_tel">Téléphone :
                      <input type="tel" name="company_tel" maxlength="10" minlength="10" id="company_tel" value="<?= $company['phone']; ?>">
                    </label>
                    <label for="company_email">E-mail :
                      <input type="email" name="company_email" id="company_email" value="<?= $company['email']; ?>">
                    </label>
                  </fieldset>
                  <fieldset>
                    <legend>Adresse</legend>
                    <label for="street_number">N° de rue :
                      <input type="number" name="street_number" id="street_number" value="<?= $company['street_number']; ?>">
                    </label>
                    <label for="street_name">Rue :
                      <input type="text" name="street_name" id="street_name" value="<?= $company['street_name']; ?>">
                    </label>

                    <label for="city">Ville :
                      <input type="text" name="city" id="city" value="<?= $company['city']; ?>">
                    </label>
                    <label for="zip_code">Code postal :
                      <input type="number" name="zip_code" id="zip_code" value="<?= $company['zip_code']; ?>">
                    </label>
                  </fieldset>
                  <fieldset id="opening_setting">
                    <legend>
                      Horaires d'ouverture :
                    </legend>
                    <p class="warning">⚠️ pour l'heure de fermeture est égale à l'heure d'ouverture, cela indique que le garage est "fermé"</p>
                    <?php
                    $req = " SELECT * FROM openings;";
                    foreach ($bdd->query($req) as $key => $opening) { ?>
                      <p>
                        <span><?= $opening['day']; ?> :</span>
                        <label for="am_opening_<?= $key + 1; ?>">Ouverture matin : <br>
                          <input type="time" min="06:00" max="21:00" id="am_opening_<?= $key + 1; ?>" name="am_opening_<?= $key + 1; ?>" value="<?= $opening['am_opening']; ?>">
                        </label>
                        <label for="am_closure_<?= $key + 1; ?>">Fermeture matin : <br>
                          <input type="time" min="06:00" max="21:00" id="am_closure_<?= $key + 1; ?>" name="am_closure_<?= $key + 1; ?>" value="<?= $opening['am_closure']; ?>">
                        </label>
                        <label for="pm_opening_<?= $key + 1; ?>">Ouverture après-midi : <br>
                          <input type="time" min="06:00" max="21:00" id="pm_opening_<?= $key + 1; ?>" name="pm_opening_<?= $key + 1; ?>" value="<?= $opening['pm_opening']; ?>">
                        </label>
                        <label for="pm_closure_<?= $key + 1; ?>">Fermeture après-midi : <br>
                          <input type="time" min="06:00" max="21:00" id="pm_closure_<?= $key + 1; ?>" name="pm_closure_<?= $key + 1; ?>" value="<?= $opening['pm_closure']; ?>">
                        </label>
                      </p>
                    <?php } ?>
                  </fieldset>
                  <input class="button" type="submit" value="Enregistrer">
                <?php } ?>
              </form>

            </div>
            <!-- --------------------------------------------------------------- -->

            <!-- --------------------------------------------- EMPLOYEES ACCOUNT -->
            <div class="employees">
              <h1>Comptes employés</h1>
              <div>
                <h2>Créer un compte employé</h2>
                <!-- <form action="config/admin_employee_config.php" method="post"> -->
                <form method="post">
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
                  <input class="button" type="submit" value="Enregistrer" name="new_employee">
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
                    $employees = get_employees($bdd);
                    foreach ($employees as $employee) {
                      $userObject = new Users($employee['id'], $employee['first_name'], $employee['last_name'], $employee['email'], $employee['role'], $employee['password']);
                      $userObject->display_list();
                    }
                    ?>
                  </tbody>
                </table>
              </div>

              <!-- 
                edit employee account
                <div class="modal_employee hidden">
                <input type="hidden" name="hidden_id" id="hidden_id">
                <?php
                // foreach($employees as $employee) {
                //   if($employee['id'] == )
                //   $employee_first_name =;
                //   $employee_last_name =;
                //   $employee_password =;
                // }
                ?>
                <label for="employee_first_name_modal">Prénom :
                  <input type="text" name="employee_first_name" id="employee_first_name_modal" value="bonjour">
                </label>
                <label for="employee_last_name_modal">Nom :
                  <input type="text" name="employee_last_name" id="employee_last_name_modal" value="bonjour">
                </label>
                <label for="employee_password_modal">Mot de passe :
                  <input type="password" name="employee_password" id="employee_password_modal" value="bonjour">
                </label>
                </fieldset>
                <input class="button" type="submit" value="Mettre à jour" name="updateemployee">
              </div> -->
            </div>
            <!-- --------------------------------------------------------------- -->

            <!-- ----------------------------------------------- CLIENT MESSAGES -->
            <div class="messages">
              <h1>Formulaires contact</h1>
              <table>
                <thead>
                  <tr>
                    <th>Auteur</th>
                    <th>Réf. Véhicule</th>
                    <th>Message</th>
                    <th>Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $messages = get_all_new_messages($bdd);
                  foreach ($messages as $message) {
                    $current = new Messages($message['id'], $message['first_name'], $message['last_name'], $message['email'], $message['content'], $message['tel'], $message['title']);
                    $current->display_list();
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- --------------------------------------------------------------- -->

            <!-- ----------------------------------------------- CLIENT COMMENTS -->
            <div class="comments">
              <h1>Avis clients</h1>
              <h2>Nouveaux avis</h2>
              <table>
                <thead>
                  <tr>
                    <th>Prénom</th>
                    <th>Note</th>
                    <th>Commentaire</th>
                    <th>Valider</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $comments = get_all_new_comments($bdd);
                  foreach ($comments as $comment) {
                    $current_comment = new Comments($comment['id'], $comment['first_name'], $comment['last_name'], $comment['note'], $comment['comment']);
                    $current_comment->display_list();
                  }
                  ?>
                </tbody>
              </table>
              <h2>Avis vérifiés</h2>
              <table class="checked">
                <thead>
                  <tr>
                    <th>Prénom</th>
                    <th>Note</th>
                    <th>Commentaire</th>
                    <th>Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $comments = get_all_valid_comments($bdd);
                  foreach ($comments as $comment) {
                    $current_comment = new Comments($comment['id'], $comment['first_name'], $comment['last_name'], $comment['note'], $comment['comment']);
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
                <form method="post" enctype="multipart/form-data">
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
                    <label for="energy">Carburant :
                      <input type="text" name="energy" id="energy">
                    </label>
                    <label for="price">Prix :
                      <input type="number" name="price" id="price">
                    </label>
                    <label for="main_picture">Photo principale :
                      <input type="file" name="main_picture" id="main_picture" accept="image/jpeg, image/jpg, image/png">
                    </label>
                  </fieldset>
                  <input class="button" type="submit" value="Enregistrer" name="new_car">
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
                      <!-- <th>Autres photos</th> -->
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $cars = get_all_cars($bdd);
                    if ($cars) {
                      foreach ($cars as $car) {
                        $pictures = get_main_picture($bdd, $car['id']);
                        $current = new Cars($car['id'], $car['brand'], $car['model'], $car['mileage'], $car['year'], $car['energy'], $car['price'], $pictures);
                        $current->display_list_admin();
                      }
                    } else { ?>
                      <p>Aucun véhicule n'est enregistré</p>
                    <?php } ?>

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