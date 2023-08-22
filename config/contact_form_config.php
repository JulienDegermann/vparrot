<?php
require_once '../classes/class_users.php';
require_once '../classes/class_messages.php';
require_once '../data_base/data_base_connect.php';

$errors = [];
$messages = [];
if (isset($_POST['send_message']) && isset($_POST['TOS'])) {
  $messages[] = 'TOS validées';

  $first_name = ucfirst(strtolower(trim($_POST['first_name'])));
  $last_name = ucwords(strtolower(trim($_POST['last_name'])));
  $email = strtolower(trim($_POST['email']));
  $tel = $_POST['tel'];
  $content = trim($_POST['message']);

  if (!$first_name || !$last_name || !$email || !$tel || !$content) {
    $errors[] = 'Un champ est manquant';
  } else {
    $user = get_user_by_full_name($bdd, $first_name, $last_name);
    if (!$user) {
      insert_new_user($bdd, $first_name, $last_name, 'client', $email);
      $user = get_user_by_full_name($bdd, $first_name, $last_name);
    }
    $user_id = $user['id'];
    insert_message($bdd, $user_id, $content);

  }
} else {
  $errors[] = 'Vous n\'avez pas accepté les conditions générales d\'utilisation';
}

foreach ($errors as $error) {
  echo $error;
}
foreach ($messages as $message) {
  echo $message;
}
header('location: ../contact.php');
