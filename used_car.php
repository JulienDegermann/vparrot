<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<!-- PAGE NAME -->
<?php $current_page = 'used_car'; ?>


<?php // cars BDD
require_once 'lib/cars_list.php'; ?>

<!-- ----------------------------------------------------------- HEADER CALL -->
<?php require_once 'templates/header.php'; ?>

<section id="section-1">

  <div class="container">
    <div class="row">
      <!-- --------------------------------------------------------- GET BDD -->


      <?php
      $error = false;
      // check if there is ?id=x in url
      if (isset($_GET['id'])) {
        // save the id in $id
        $id = $_GET['id'];

        // get the car ad which match with the id from url

        // check if there is a car in $cars at id $id
        $car = getCarsById($cars, $id);

        if (!$car) {
          $error = true;
      ?>
          <h1>ERROR 404 : PAGE INTROUVABLE.</h1>

        <?php
        } else {
          $car = $cars[$_GET['id']];
        ?>
          <h1><?php echo $car['marque'] . ' ' . $car['modèle'] ?>


          <?php
        }
          ?>
          </h1>
        <?php }; ?>
    </div>
  </div>
</section>

<!-- ----------------------------------------------------------- FOOTER CALL -->
<?php require_once 'templates/footer.php'; ?>