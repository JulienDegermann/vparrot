<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<!-- PAGE NAME -->
<?php $current_page = 'admin'; ?>

<?php // cars BDD
require_once 'lib/cars_list.php';
require_once 'lib/workshop_datas.php';?>

<!-- ----------------------------------------------------------- HEADER CALL -->
<?php require_once 'templates/header.php'; ?>

<section id="section-1">
  <div class="container">
    <div class="row">

      <aside class="bloc-4">
        <nav class="admin-nav">
          <ul>
            <li id="garage" class="active">Informations sur le garage</li>
            <li id="employee">Création d'un compte employé</li>
            <li id="comments">Gestion des commentaires clients</li>
            <li id="messages">Gestion des messages clients</li>
          </ul>
        </nav>
      </aside>
      <article class="bloc-3-4 garage" id="display">
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
              <label for="street_name">Rue :
                <input type="text" name="street_name" id="street_name" value="<?= $address_input['street_name']; ?>">
              </label>
              <label for="street_number">N° de rue :
                <input type="number" name="street_number" id="street_number" value="<?= $address_input['street_number']; ?>">
              </label>
              <label for="city">Ville :
                <input type="text" name="city" id="city" value="<?= $address_input['city']; ?>">
              </label>
              <label for="zip_code">Ville :
                <input type="number" name="zip_code" id="zip_code" value="<?= $address_input['zip_code']; ?>">
              </label>
            </fieldset>






            <input class="button" type="submit" value="Enregistrer">


          </form>



        </div>
        <div class="employee">
          <h1>Comptes employés</h1>
        </div>
        <div class="messages">
          <h1>Formulaires contact</h1>
        </div>
        <div class="comments">
          <h1>Avis clients</h1>
        </div>




    </div>
  </div>
</section>

<!-- ----------------------------------------------------------- FOOTER CALL -->
<?php require_once 'templates/footer.php'; ?>