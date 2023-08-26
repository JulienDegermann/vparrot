<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<!-- PAGE NAME -->
<?php $current_page = 'used_car';
$current_pageFR = 'Véhicules d\'occasion';

// cars BDD
// require_once 'lib/cars_list.php';
require_once 'classes/class_cars.php';
require_once 'data_base/data_base_connect.php';

$error = false;
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $car = get_car_by_id($bdd, $id);
}
// ----------------------------------------------------------------- HEADER CALL
require_once 'templates/header.php'; ?>


<section id="section-1">
  <div class="container">
    <div class="row">
      <a href="used_cars.php">
        <?php require 'assets/images/icons/arrow_prev.svg'; ?>
        retour
      </a>
      <?php
      if (!$car) {
        $error = true;
        header('location: 404.php');
        exit();
      } else {
        $pictures = get_all_pictures($bdd, $id);
        $carObject = new Cars($car['id'], $car['brand'], $car['model'], $car['mileage'], $car['year'], $car['energy'], $car['price'], $pictures);
        $carObject->display_item();
      }
      ?>
    </div>
    <div class="form_wrapper hidden">
      <button type="button" class="close"> <?php include_once 'assets/images/icons/close.svg'; ?></button>
      <?php require_once 'templates/contact_form.php'; ?>
    </div>
  </div>
</section>

<!-- ----------------------------------------------------------- FOOTER CALL -->
<?php require_once 'templates/footer.php'; ?>