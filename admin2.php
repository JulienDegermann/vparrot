<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<!-- PAGE NAME -->
<?php $current_page = 'admin';
require_once 'lib/cars_list.php';
require_once 'lib/workshop_datas.php';
require_once 'lib/users.php';
require 'classes/class_users.php';
require 'classes/class_comments.php';

// if (isset($_POST['email']) && isset($_POST['password'])) {
//   $error = '';
//   if ($_POST['email'] === 'admin@admin.com' && $_POST['password'] === 'root') {
//     var_dump(('vous êtes connecté en tant qu\'admin'));
//     $error = 'connected';
//   }

//   foreach ($users['employee'] as $user) {
//     if ($_POST['email'] === $user['email'] && $_POST['password'] === $user['password']) {
//       var_dump('vous êtes connecté en tant que : ' . $user['first_name'] . ' ' . $user['last_name']);
//       $error = 'connected';
//     }
//   }
//   if ($error != 'connected') {
// 
?>
<!-- <p class="error">e-mail ou mot de passe incorrect</p> -->
// <?php
    //     require_once 'login.php';
    //   }
    // } else {
    //   $error = 'erreur de connexion';
    // }


    // cars BDD

    ?>

<!-- ----------------------------------------------------------- HEADER CALL -->
<?php require_once 'templates/header.php';?>

<section id="section-1">
  <div class="container">
    <div class="row">

      <aside class="bloc-4">
        <nav class="admin-nav">
          <ul class="admin">
            <li id="garage" class="active">Informations sur le garage</li>
            <li id="employee">Comptes employé</li>
          </ul>

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
          <form action="infos.php" method="post">
            <fieldset>
              <label for="name">Nom établissement :
                <input type="text" name="name" id="name" value="<?= $address_input['name']; ?>">
              </label>
              <label for="tel">Téléphone :
                <input type="tel" name="tel" maxlength="10" minlength="10" id="tel" value="<?= $phone; ?>">
              </label>
              <label for="email">E-mail :
                <input type="email" name="email" id="email" value="<?= $email; ?>">
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
            <form action="" method="post">
              <fieldset>
                <label for="first_name">Prénom :
                  <input type="text" name="first_name" id="first_name">
                </label>
                <label for="last_name">Nom :
                  <input type="tel" name="last_name" id="last_name">
                </label>
                <label for="password">Mot de passe :
                  <input type="password" name="password" id="password">
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
                  <th>E-mail</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($users['employee'] as $key => $employee) {
                  $userObject = new Users($employee['id'], $employee['first_name'], $employee['last_name'], $employee['email'], $employee['key'] = 0);
                  $userObject->display_list();
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
            <form action="infos.php" method="post">
              <fieldset>
                <label for="first_name">Prénom :
                  <input type="text" name="first_name" id="first_name">
                </label>
                <label for="last_name">Nom :
                  <input type="tel" name="last_name" maxlength="10" minlength="10" id="last_name">
                </label>
                <label for="email">E-mail :
                  <input type="email" name="email" id="email" value="<?= $email; ?>">
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
                    <td><?= $car['marque']; ?></td>
                    <td><?= $car['modèle']; ?></td>
                    <td><?= $car['année']; ?></td>
                    <td><?= $car['kilométrage']; ?> kms</td>
                    <td><?= $car['prix']; ?> €</td>
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
<?php require_once 'templates/footer.php'; ?>