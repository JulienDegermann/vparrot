<?php
require_once '../data_base/data_base_connect.php';



if(isset($_POST['brand'])){
  $brand = $_POST['brand'];
}
if(isset($_POST['model'])){
  $model = $_POST['model'];
}
if(isset($_POST['year'])){
  $year = $_POST['year'];
}
if(isset($_POST['mileage'])){
  $mileage = $_POST['mileage'];
}
if(isset($_POST['price'])){
  $price = $_POST['price'];
}
if(isset($_POST['main_picture'])){
  $main_picture = $_POST['main_picture'];
}