<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<!-- PAGE NAME -->
<?php
$current_page = 'used_cars';
$current_pageFR = 'Véhicules d\'occasion';
?>

<!-- ----------------------------------------------------------- HEADER CALL -->
<?php
require_once 'templates/header.php';
require_once 'classes/class_cars.php';
?>

<!-- ----------------------------------------------------------- CONTACT.PHP -->
<?php
foreach ($errors as $error) { ?>
  <div class="container">
    <div class="error">
      <?= $error; ?>
    </div>
  </div>
<?php }
foreach ($infos as $info) { ?>
  <div class="container">

    <div class="info">
      <?= $info; ?>
    </div>
  </div>
<?php } ?>
<section id="section-1">

  <div class="container">
    <div class="row">
      <h1>nos véhicules d'occasion</h1>
      <aside class="bloc-5">
        <div class="filter">
          <h2>Filtres</h2>
          <form action="" method="post">
            <fieldset>
              <legend>Année</legend>
              <label for="year_min">
                <input type="text" name="year_min" id="year_min" placeholder="Mini">
              </label>
              <label for="year_max">
                <input type="text" name="year_max" id="year_max" placeholder="Maxi">
              </label>
            </fieldset>
            <fieldset>
              <legend>Prix</legend>
              <label for="price_min">
                <input type="text" name="price_min" id="price_min" placeholder="Mini">
              </label>
              <label for="price_max">
                <input type="text" name="price_max" id="price_max" placeholder="Maxi">
              </label>
            </fieldset>
            <fieldset>
              <legend>Kilométrage</legend>
              <label for="mileage_min">
                <input type="text" name="mileage_min" id="mileage_min" placeholder="Mini">
              </label>
              <label for="mileage_max">
                <input type="text" name="mileage_max" id="mileage_max" placeholder="Maxi">
              </label>
            </fieldset>
          </form>
        </div>
      </aside>
      <div class="bloc-4-5">
        <div class="grid">

          <?php
          $cars = get_all_cars($bdd);
          foreach ($cars as $car) {
            $carObject = new Cars($car['id'], $car['brand'], $car['model'], $car['mileage'], $car['year'], $car['energy'], $car['price'], $car['file_name']);
            $carObject->display_list();
          ?>
          <?php
          }; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ----------------------------------------------------------- FOOTER CALL -->
<?php require_once 'templates/footer.php'; ?>