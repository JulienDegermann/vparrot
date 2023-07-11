<?php
//BDD

define('_CAR_IMAGE_PATH_', 'uploads/images/');

$cars = [
  [
    'id' => 1,
    'brand' => 'Renault',
    'model' => 'Clio',
    'mileage' => 50000,
    'year' => 2017,
    'energy' => 'Essence',
    'price' => 8000,
    'image' => 'peugeot'
  ],
  [
    'id' => 2,
    'brand' => 'Volkswagen',
    'model' => 'Golf',
    'mileage' => 80000,
    'year' => 2015,
    'energy' => 'Diesel',
    'price' => 10000,
    'image' => 'peugeot'
  ],
  [
    'id' => 3,
    'brand' => 'Ford',
    'model' => 'Fiesta',
    'mileage' => 35000,
    'year' => 2018,
    'energy' => 'Essence',
    'price' => 7000,
    'image' => 'peugeot'
  ],
  [
    'id' => 4,
    'brand' => 'BMW',
    'model' => 'Serie 3',
    'mileage' => 100000,
    'year' => 2014,
    'energy' => 'Diesel',
    'price' => 12000,
    'image' => 'peugeot'
  ],
  [
    'id' => 5,
    'brand' => 'Toyota',
    'model' => 'Corolla',
    'mileage' => 60000,
    'year' => 2016,
    'energy' => 'Essence',
    'price' => 9000,
    'image' => 'peugeot'
  ],
  [
    'id' => 6,
    'brand' => 'Audi',
    'model' => 'A4',
    'mileage' => 70000,
    'year' => 2015,
    'energy' => 'Diesel',
    'price' => 15000,
    'image' => 'peugeot'
  ],
  [
    'id' => 7,
    'brand' => 'Peugeot',
    'model' => '308',
    'mileage' => 45000,
    'year' => 2019,
    'energy' => 'Essence',
    'price' => 8500,
    'image' => 'peugeot'
  ],
  [
    'id' => 8,
    'brand' => 'Mercedes-Benz',
    'model' => 'Classe C',
    'mileage' => 90000,
    'year' => 2013,
    'energy' => 'Diesel',
    'price' => 11000,
    'image' => 'peugeot'
  ],
  [
    'id' => 9,
    'brand' => 'Fiat',
    'model' => '500',
    'mileage' => 25000,
    'year' => 2020,
    'energy' => 'Essence',
    'price' => 7500,
    'image' => 'peugeot'
  ],
  [
    'id' => 10,
    'brand' => 'Nissan',
    'model' => 'Qashqai',
    'mileage' => 55000,
    'year' => 2017,
    'energy' => 'Diesel',
    'price' => 9500,
    'image' => 'peugeot'
  ]
];


function getCarsById (array $cars, int $id):array|bool {
  if(isset($cars[$id])) {
    return $cars[$id];
  } else {
    return false;
  }
}
