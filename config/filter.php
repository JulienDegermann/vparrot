
<?php
require_once '../data_base/data_base_connect.php';
require_once '../classes/class_cars.php';

if (isset($_GET['filter'])) {
  if (isset($_GET['price_min'])) {
    $price_min = intval(htmlentities($_GET['price_min']));
  }
  if (isset($_GET['price_max'])) {
    $price_max = intval(htmlentities($_GET['price_max']));
  }
  if (isset($_GET['year_min'])) {
    $year_min = intval(htmlentities($_GET['year_min']));
  }
  if (isset($_GET['year_max'])) {
    $year_max = intval(htmlentities($_GET['year_max']));
  }
  if (isset($_GET['mileage_min'])) {
    $mileage_min = intval(htmlentities($_GET['mileage_min']));
  }
  if (isset($_GET['mileage_max'])) {
    $mileage_max = intval(htmlentities($_GET['mileage_max']));
  }
  
  $filter = get_filter($bdd, $year_min, $year_max, $price_min, $price_max, $mileage_min, $mileage_max);

  header('Content-Type: appplication/json');
  echo json_encode($filter);
}
