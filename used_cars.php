<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<!-- PAGE NAME -->
<?php $current_page = 'used_cars'; ?>

<!-- ----------------------------------------------------------- HEADER CALL -->
<?php require_once '../templates/header.php'; ?>

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
          $cars = [
            [
              'id' => 1,
              'marque' => 'Renault',
              'modèle' => 'Clio',
              'kilométrage' => 50000,
              'année' => 2017,
              'carburant' => 'Essence',
              'prix' => 8000
            ],
            [
              'id' => 2,
              'marque' => 'Volkswagen',
              'modèle' => 'Golf',
              'kilométrage' => 80000,
              'année' => 2015,
              'carburant' => 'Diesel',
              'prix' => 10000
            ],
            [
              'id' => 3,
              'marque' => 'Ford',
              'modèle' => 'Fiesta',
              'kilométrage' => 35000,
              'année' => 2018,
              'carburant' => 'Essence',
              'prix' => 7000
            ],
            [
              'id' => 4,
              'marque' => 'BMW',
              'modèle' => 'Serie 3',
              'kilométrage' => 100000,
              'année' => 2014,
              'carburant' => 'Diesel',
              'prix' => 12000
            ],
            [
              'id' => 5,
              'marque' => 'Toyota',
              'modèle' => 'Corolla',
              'kilométrage' => 60000,
              'année' => 2016,
              'carburant' => 'Essence',
              'prix' => 9000
            ],
            [
              'id' => 6,
              'marque' => 'Audi',
              'modèle' => 'A4',
              'kilométrage' => 70000,
              'année' => 2015,
              'carburant' => 'Diesel',
              'prix' => 15000
            ],
            [
              'id' => 7,
              'marque' => 'Peugeot',
              'modèle' => '308',
              'kilométrage' => 45000,
              'année' => 2019,
              'carburant' => 'Essence',
              'prix' => 8500
            ],
            [
              'id' => 8,
              'marque' => 'Mercedes-Benz',
              'modèle' => 'Classe C',
              'kilométrage' => 90000,
              'année' => 2013,
              'carburant' => 'Diesel',
              'prix' => 11000
            ],
            [
              'id' => 9,
              'marque' => 'Fiat',
              'modèle' => '500',
              'kilométrage' => 25000,
              'année' => 2020,
              'carburant' => 'Essence',
              'prix' => 7500
            ],
            [
              'id' => 10,
              'marque' => 'Nissan',
              'modèle' => 'Qashqai',
              'kilométrage' => 55000,
              'année' => 2017,
              'carburant' => 'Diesel',
              'prix' => 9500
            ]
          ];
          foreach ($cars as $car) {
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
                  <a href="http://localhost:8888/pages/used_car.php?id=<?php echo $car['id']?>" class="button">+ d'infos</a>
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
<?php require_once '../templates/footer.php'; ?>