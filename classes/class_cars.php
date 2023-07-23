<?php


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

  public function __construct($id, $brand, $model, $mileage, $year, $energy, $price, $key)
  {
    // Assigner les valeurs des paramètres aux propriétés correspondantes
    $this->id = $id;
    $this->brand = $brand;
    $this->model = $model;
    $this->mileage = $mileage;
    $this->year = $year;
    $this->energy = $energy;
    $this->price = $price;
    $this->key = $key;
  }

  function display_list()
  {
    require 'templates/car_card.php';
  }

  function display_item()
  {
    require 'templates/car_ad.php';
  }


  function get_car_by_id($bdd, $id) {
    $sql = "SELECT * FROM cars WHERE id = :id;";
    // get PDOStatement object ($stmt)
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;
    return $result;
  }
}