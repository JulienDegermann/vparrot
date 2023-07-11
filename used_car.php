<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<!-- PAGE NAME -->
<?php $current_page = 'used_car';

// cars BDD
require_once 'lib/cars_list.php';
require_once 'classes/class_cars.php';

// get the car with id
$error = false;
// check if there is ?id=x in url and save into $id
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // get the car ad which match with the id from url
  // check if there is a car in $cars at id $id
  $car = getCarsById($cars, $id);


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
          $car = $cars[$_GET['id']];
          $carObject = new Cars($car['id'], $car['brand'], $car['model'], $car['mileage'], $car['year'], $car['energy'], $car['price'], $key=0);
          $carObject->display_item();
        }}?>
      </div>
      <div class="form_wrapper hidden">
      <?php require_once 'templates/contact_form.php'; ?>
      </div>
    </div>
  </section>

  <!-- ----------------------------------------------------------- FOOTER CALL -->
  <?php require_once 'templates/footer.php'; ?>