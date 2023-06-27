<?php $current_page = 'used_car'; ?>
<?php
//BDD
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


function getCarsById (array $cars, int $id):array|bool {
  if(isset($cars[$id])) {
    return $cars[$id];
  } else {
    return false;
  }
}
