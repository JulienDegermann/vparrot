<?php
require_once '../data_base/data_base_connect.php';



if(isset($_POST['brand'])){
  $brand = trim($_POST['brand']);
}
if(isset($_POST['model'])){
  $model = trim($_POST['model']);
}
if(isset($_POST['year'])){
  $year = trim($_POST['year']);
}
if(isset($_POST['mileage'])){
  $mileage = trim($_POST['mileage']);
}
if(isset($_POST['price'])){
  $price = trim($_POST['price']);
}
if(isset($_POST['main_picture'])){
  $main_picture = trim($_POST['main_picture']);
}