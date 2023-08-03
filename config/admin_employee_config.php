<?php
require_once '../data_base/data_base_connect.php';

if(isset($_POST['employee_first_name'])){
  $employee_first_name = trim($_POST['employee_first_name']);
}
if(isset($_POST['employee_last_name'])){
  $employee_last_name = trim($_POST['employee_last_name']);
}

if(isset($_POST['employee_password'])){
  $employee_password = trim($_POST['employee_password']);
}
if(isset($_POST['employee_first_name']) && isset($_POST['employee_last_name'])){
  $employee_email = strtolower($employee_first_name .  '.' . str_replace(' ', '-', $employee_last_name) . '@example.com');
}
// if(isset($_POST['client_first_name'])){
//   $client_first_name = $_POST['client_first_name'];
// }
// if(isset($_POST['client_last_name'])){
//   $client_last_name = $_POST['client_last_name'];
// }


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