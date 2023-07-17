<?php
session_start();
require_once '../lib/users.php';
require_once '../data_base/data_base_connect.php';

$current_email = $_POST['email'];
$current_password = $_POST['password'];

$error = '';

$employee_mail_db = [];
foreach ($users['employee'] as $employee) {
  $employee_mail_db[] = $employee['email'];
}

$req = "SELECT * FROM users";

// define variables for connection
$role='';
$first_name_connected = '';
$last_name_connected = '';

foreach ($bdd->query($req) as $user) {
  if ($current_email == $user['email'] && $current_password == $user['password']) {
    $first_name_connected = $user['first_name'];
    $last_name_connected = $user['last_name'];
    $role = $user['role'];
    var_dump('mdp + email OK : ' . $user['email'] . $user['role'] . $role );
  }
}
if ($role == '') {
  var_dump('je ne dois pas voir ca');
  $_SESSION['error'] = 'l\'identifiant ou le mot de passe est incorrect.';
  $error = 'l identifiant ou le mot de passe est incorrect.';
  $bdd = null;
  header('location: ../login.php');
  exit();
} else {
  $error = '';
  session_destroy();
  session_start();
  $_SESSION['role'] = $role;
  $_SESSION['user'] = ['first_name' => $first_name_connected, 'last_name' => $last_name_connected];
  $bdd = null;
  header('location: ../admin.php');
  exit();
}
