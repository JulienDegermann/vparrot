<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<!-- PAGE NAME -->
<?php $current_page = 'used_cars'; 
$current_pageFR='Véhicules d\'occasion';
?>

<!-- ----------------------------------------------------------- HEADER CALL -->
<?php require_once 'templates/header.php'; ?>
<?php require_once 'classes/class_cars.php'; ?>

<!-- ----------------------------------------------------------- CONTACT.PHP -->

<section id="section-1">

  <div class="container">
    <div class="row">
      <h1>nos véhicules d'occasion</h1>
      <aside class="bloc-5">
        <div class="filter">
          <h2>Filtres</h2>
          <label for="year">Année
            <input type="range" id="year" name="year" min="100" max="10000">
          </label>
          <label for="mileage">Kilométrage
            <input type="range" id="mileage" name="mileage" min="100" max="10000">
          </label>
          <label for="price">Prix
            <input type="range" id="price" name="price" min="100" max="10000">
          </label>
        </div>
      </aside>
      <div class="bloc-4-5">
        <div class="grid">

          <?php
          // cars BDD
          require_once 'lib/cars_list.php';

          foreach ($cars as $key => $car) {
            $carObject = new Cars($car['id'], $car['brand'], $car['model'], $car['mileage'], $car['year'], $car['energy'], $car['price'], $key);
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