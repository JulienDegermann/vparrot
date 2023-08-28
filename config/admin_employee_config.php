<?php
require_once '../data_base/data_base_connect.php';
require_once '../classes/class_users.php';
session_start();

$errors = [];
$messages = [];
// account create
if (isset($_POST['new_employee'])) {
  $employee_first_name = ucfirst(trim($_POST['employee_first_name']));
  $employee_last_name = ucfirst(trim($_POST['employee_last_name']));
  $employee_password = password_hash($_POST['employee_password'], PASSWORD_DEFAULT);
  $employee_email = strtolower($employee_first_name .  '.' . str_replace(' ', '-', $employee_last_name) . '@example.com');

  if (!$employee_first_name || !$employee_last_name || !$employee_password || !$employee_email) {
    $errors[] = 'Un champ requis est manquant';
  } else {
    $user = get_user_by_full_name($bdd, $employee_first_name, $employee_last_name);
    if ($user) {
      $errors[] = 'Le compte existe déjà';
    } else {
      $messages[] = 'création d\'un nouvel espace employé';
      add_user($bdd, $employee_first_name, $employee_last_name, 'employee', $employee_email, null, $employee_password);
    }
  }
  foreach ($errors as $error) {
    echo $error . '<br>';
  }
  foreach ($messages as $message) {
    echo $message . '<br>';
  }
  header('Location: ../admin.php');
}
// account connect
elseif (isset($_POST['connect'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  if (!$email || !$password) {
    $errors[] = "Identifiant ou mot de passe incorrect";
  } else {
    $user = get_user_by_email($bdd, $email);
    if(!$user || (!password_verify($password, $user['password']) && $user['password'] !== $password)) {
      $errors[] = "Identifiant ou mot de passe incorrect";
    } else {
      $_SESSION['user'] = [
        'first_name' => $user['first_name'],
        'last_name' => $user['last_name'],
        'role' => $user['role']
      ];
      header('Location: ../admin.php');
    }
  }
  foreach ($errors as $error) {
    echo $error . '<br>';
  }
  foreach ($messages as $message) {
    echo $message . '<br>';
  }}
// nothing 
else {
  // header('Location: ../admin.php');
}
