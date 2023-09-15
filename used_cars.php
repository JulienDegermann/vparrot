<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<!-- PAGE NAME -->
<?php
$current_page = 'used_cars';
$current_pageFR = 'Véhicules d\'occasion';


if (isset($_GET['price_min'])) {
  $price_min = $_GET['price_min'];
}
if (isset($_GET['price_max'])) {
  $price_max = $_GET['price_max'];
}
if (isset($_GET['mileage_min'])) {
  $mileage_min = $_GET['mileage_min'];
}
if (isset($_GET['mileage_max'])) {
  $mileage_max = $_GET['mileage_min'];
}
if (isset($_GET['year_min'])) {
  $year_min = $_GET['year_min'];
}
if (isset($_GET['year_max'])) {
  $year_max = $_GET['year_max'];
}

echo isset($price_min) ? $price_min: '';
echo isset($price_max) ? $price_max: '';
echo isset($mileage_min) ? $mileage_min: '';
echo isset($mileage_max) ? $mileage_max: '';
echo isset($year_min) ? $year_min: '';
echo isset($year_max) ? $year_max: '';


?>

<!-- ----------------------------------------------------------- HEADER CALL -->
<?php require_once 'templates/header.php'; ?>
<?php require_once 'classes/class_cars.php'; ?>

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
          // require_once 'lib/cars_list.php';
          $cars = get_all_cars($bdd);
          foreach ($cars as $car) {
            $pictures = get_main_picture($bdd, $car['id']);
            $carObject = new Cars($car['id'], $car['brand'], $car['model'], $car['mileage'], $car['year'], $car['energy'], $car['price'], $pictures);
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