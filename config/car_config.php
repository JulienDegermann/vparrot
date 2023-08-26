<?php
require_once '../data_base/data_base_connect.php';
require_once '../classes/class_cars.php';
require_once '../lib/functions.php';
session_start();



$errors = [];
$messages = [];
if (isset($_POST['new_car'])) {
  $brand = $_POST['brand'];
  $model = strval($_POST['model']);
  $year = $_POST['year'];
  $mileage = $_POST['mileage'];
  $price = $_POST['price'];
  $energy = $_POST['energy'];
  $main_picture = $_FILES['main_picture']['tmp_name'];
  echo '<br>';
  if ($main_picture) {
    if (getimagesize($main_picture)) {
      $file_name = slugify((uniqid() . '-' . $_FILES['main_picture']['name']));
      move_uploaded_file($main_picture, '../uploads/images/' . $file_name);
    }
  }


  // || !$main_picture
  if (!$brand || !$model || !$year || !$mileage || !$price || !$energy || !$main_picture) {
    $errors[] = 'Un champ est manquant';
  } else {
    $new_car = add_car($bdd, $brand, $model, $year, $mileage, $price, $energy);
    $car_id = $bdd->lastInsertId();
    $new_image = add_image($bdd, $file_name, $car_id);
    if ($new_car) {
      $messages[] = 'La voiture a été ajoutée avec succès';
    } else {
      $errors[] = 'Une erreur s\'est produite';
    }
  }

  foreach ($errors as $error) {
    echo $error . '<br>';
  }
  foreach ($messages as $message) {
    echo $message . '<br>';
  }
  header('location: ../admin.php');
  exit();
} else {
  header('location: ../admin.php');
  exit();
}
