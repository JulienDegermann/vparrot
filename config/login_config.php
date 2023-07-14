<?php
session_start();
require_once '../lib/users.php';

$current_email = $_POST['email'];
$current_password = $_POST['password'];

$error = '';

$employee_mail_db = [];
foreach ($users['employee'] as $employee) {
  $employee_mail_db[] = $employee['email'];
}

// define variables for connection
$role;
$first_name_connected = '';
$last_name_connected = '';

if ($current_email === $users['admin']['email'] && $current_password === $users['admin']['password']) {
  $role = 'admin';
  $first_name_connected = $users['admin']['first_name'];
  $last_name_connected = $users['admin']['last_name'];
} else if (in_array($current_email, $employee_mail_db)) {
  foreach ($users['employee'] as $employee) {
    if ($current_email === $employee['email'] && $current_password === $employee['password']) {
      $role = 'employee';

      $first_name_connected = $employee['first_name'];
      $last_name_connected = $employee['last_name'];
    }
  }
}


if (!$role) {
  $_SESSION['error'] = 'l\'identifiant ou le mot de passe est incorrect.';
  $error = 'l identifiant ou le mot de passe est incorrect.';
  header('location: ../login.php');
  exit();
} else {
  $error = '';
  session_destroy();
  session_start();
  $_SESSION['role'] = $role;
  $_SESSION['user'] = ['first_name' => $first_name_connected, 'last_name' => $last_name_connected ];
  header('location: ../admin.php');
  exit();
}
