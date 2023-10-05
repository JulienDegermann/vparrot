<?php
function get_main_picture(PDO $bdd, int $car_id, bool|int $is_main = true)
{
  $sql = "SELECT * FROM images WHERE car_id = :car_id AND is_main = :is_main;";
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':car_id', $car_id, PDO::PARAM_INT);
  $stmt->bindParam(':is_main', $is_main, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}

function get_all_pictures(PDO $bdd, int $car_id)
{
  $sql = "SELECT * FROM images WHERE car_id = :car_id;";
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':car_id', $car_id, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}

class Cars
{

  public $id;
  public $brand;
  public $model;
  public $mileage;
  public $year;
  public $price;
  public $energy;
  public $key;
  public $pictures;


  public function __construct(
    int $id,
    string $brand,
    string $model,
    int $mileage,
    int $year,
    string $energy,
    int $price,
    array $pictures
  ) {
    $this->id = $id;
    $this->brand = $brand;
    $this->model = $model;
    $this->mileage = $mileage;
    $this->year = $year;
    $this->energy = $energy;
    $this->price = $price;
    $this->pictures = $pictures;
  }

  function display_list_admin()
  {
    require 'templates/car_list.php';
  }
  function display_list()
  {
    require 'templates/car_card.php';
  }

  function display_item()
  {
    require 'templates/car_ad.php';
  }
}

function get_car_by_id(PDO $bdd, int $id)
{
  $sql = "SELECT * FROM cars WHERE id = :id;";
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}

function get_all_cars(PDO $bdd)
{
  $sql = "SELECT * FROM cars;";
  $stmt = $bdd->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}

function add_car(
  PDO $bdd,
  string $brand,
  string $model,
  int $year,
  int $mileage,
  int $price,
  string $energy,
) {
  $sql = "INSERT INTO cars (
    brand,
    model,
    year,
    mileage,
    price,
    energy
  ) VALUES (
    :brand,
    :model,
    :year,
    :mileage,
    :price,
    :energy
  )";
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
  $stmt->bindParam(':model', $model, PDO::PARAM_STR);
  $stmt->bindParam(':year', $year, PDO::PARAM_INT);
  $stmt->bindParam(':mileage', $mileage, PDO::PARAM_INT);
  $stmt->bindParam(':price', $price, PDO::PARAM_INT);
  $stmt->bindParam(':energy', $energy, PDO::PARAM_STR);
  $result = $stmt->execute();
  $stmt = null;
  return $result;
}


function delete_car_by_id(PDO $bdd, int $id)
{
  $sql = "DELETE FROM images WHERE car_id = :id;";
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $stmt = null;
  $sql = "DELETE FROM cars WHERE id = :id;";
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $result = $stmt->execute();
  $stmt = null;
  return $result;
}


// make class ? 
function add_image(
  PDO $bdd,
  string $file_name,
  int $car_id
) {
  $sql = "INSERT INTO images (
    file_name,
    car_id,
    is_main
  ) VALUES (
    :file_name,
    :car_id,
    1
  )";
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':file_name', $file_name, PDO::PARAM_STR);
  $stmt->bindParam(':car_id', $car_id, PDO::PARAM_INT);
  $result = $stmt->execute();
  $stmt = null;
  return $result;
}


function get_filter(
  PDO $bdd,
  int $year_min,
  int $year_max,
  int $price_min,
  int $price_max,
  int $mileage_min,
  int $mileage_max,
) {
  $sql = "SELECT cars.*, images.file_name FROM cars JOIN images ON images.car_id = cars.id WHERE 1 = 1 ";
  if ($year_min) {
    $sql .= "AND year >= :year_min ";
  }
  if ($year_max) {
    $sql .= "AND year <= :year_max ";
  }
  if ($price_min) {
    $sql .= "AND price >= :price_min ";
  }
  if ($price_max) {
    $sql .= "AND price <= :price_max ";
  }
  if ($mileage_min) {
    $sql .= "AND mileage >= :mileage_min ";
  }
  if ($mileage_max) {
    $sql .= "AND mileage <= :mileage_max ";
  }

  $sql .= ";";
  // var_dump($sql);

  $stmt = $bdd->prepare($sql);
  if ($year_min) {
    $stmt->bindParam(':year_min', $year_min, PDO::PARAM_INT);
  }
  if ($year_max) {
    $stmt->bindParam(':year_max', $year_max, PDO::PARAM_INT);
  }
  if ($price_min) {
    $stmt->bindParam(':price_min', $price_min, PDO::PARAM_INT);
  }
  if ($price_max) {
    $stmt->bindParam(':price_max', $price_max, PDO::PARAM_INT);
  }
  if ($mileage_min) {
    $stmt->bindParam(':mileage_min', $mileage_min, PDO::PARAM_INT);
  }
  if ($mileage_max) {
    $stmt->bindParam(':mileage_max', $mileage_max, PDO::PARAM_INT);
  }

  $stmt->execute();
  $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}
