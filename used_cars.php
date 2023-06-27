<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<!-- PAGE NAME -->
<?php $current_page = 'used_cars'; ?>

<!-- ----------------------------------------------------------- HEADER CALL -->
<?php require_once 'templates/header.php'; ?>

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
          ?>
            <div class="car-vignette">
              <div class="img">
                <img src="../assets/images/pictures/car.jpeg" alt="main picture">
              </div>
              <div class="text">
                <h2><?php echo $car['marque'] . " " . $car['modèle']; ?></h2>
                <div>
                  <ul>
                    <li>Année: <?php echo $car['année']; ?></li>
                    <li>Kilométrage: <?php echo $car['kilométrage']; ?> kms</li>
                    <li class="price"><?php echo $car['prix']; ?> €</li>
                  </ul>
                  <a href="used_car.php?id=<?php echo $key ?>" class="button">+ d'infos</a>
                </div>
              </div>
            </div>
          <?php
          }; ?>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- ----------------------------------------------------------- FOOTER CALL -->
<?php require_once 'templates/footer.php'; ?>