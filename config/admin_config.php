<?php
require_once '../lib/workshop_datas.php';
require_once '../lib/users.php';
require_once '../lib/cars_list.php';
require_once '../data_base/data_base_connect.php';

// $fields = [
//   'company_name',
//   'company_tel',
//   'company_email',
//   'street_number',
//   'street_name',
//   'city',
//   'zip_code',
//   'employee_first_name',
//   'employee_last_name',
//   'employee_password',
//   'employee_email',
//   'client_first_name',
//   'client_last_name',
//   'brand',
//   'model',
//   'year',
//   'mileage',
//   'price',
//   'main_picture'
// ];



if(isset($_POST['company_name'])){
  $company_name = $_POST['company_name'];
}
if(isset($_POST['company_tel'])){
  $company_tel = $_POST['company_tel'];
}
if(isset($_POST['company_email'])){
  $company_email = $_POST['company_email'];
}
if(isset($_POST['street_number'])){
  $street_number = $_POST['street_number'];
}
if(isset($_POST['street_name'])){
  $street_name = $_POST['street_name'];
}
if(isset($_POST['city'])){
  $city = $_POST['city'];
}
if(isset($_POST['zip_code'])){
  $zip_code = $_POST['zip_code'];
}
if(isset($_POST['employee_first_name'])){
  $employee_first_name = $_POST['employee_first_name'];
}
if(isset($_POST['employee_last_name'])){
  $employee_last_name = $_POST['employee_last_name'];
}

if(isset($_POST['employee_password'])){
  $employee_password = $_POST['employee_password'];
}
if(isset($_POST['employee_first_name']) && isset($_POST['employee_last_name'])){
  $employee_email = strtolower($_POST['employee_first_name'] .  '.' . $_POST['employee_last_name'] . '@example.com');
}
if(isset($_POST['client_first_name'])){
  $client_first_name = $_POST['client_first_name'];
}
if(isset($_POST['client_last_name'])){
  $client_last_name = $_POST['client_last_name'];
}
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




// $field_group = [];
// foreach ($fields as $field) {
//   if (isset($_POST[$field])) {
//     $field_group[$field] = $_POST[$field];
    
//   }
// };


$req = "SELECT * FROM users;";
$_SESSION['error'] = '';
foreach ($bdd->query($req) as $user) {
  strtolower($employee_first_name) === strtolower($user['first_name']) && strtolower($employee_last_name) === strtolower($user['last_name']) ? $_SESSION['error'] = 'Erreur : l\'employé existe déjà' : $_SESSION['error'] = '';
}
if ($error != '') {
  var_dump($error);
  $bdd = null;
} else {
  var_dump('créer le compte');
  $save = "INSERT INTO users (first_name, last_name, email, password, role) VALUES ('$employee_first_name', '$employee_last_name', '$employee_email', '$employee_password', 'employee');";
  $bdd->query($save);
  $bdd = null;
}




header('Location: ../admin.php');
