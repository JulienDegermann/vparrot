<?php
session_start();
require_once '../data_base/data_base_connect.php';
require_once '../classes/class_comments.php';
require_once '../classes/class_users.php';

$errors = [];
$messages = [];

if (isset($_POST['new_comment'])) {
  $note = intval($_POST['note']);
  $first_name = trim(ucwords(strtolower($_POST['first_name'])));
  $last_name = trim(ucwords(strtolower($_POST['last_name'])));
  $comment = trim($_POST['comment']);

  if (!$note || !$first_name || !$last_name || !$comment) {
    $errors[] = 'Un champ est manquant';
  } else {
    $user = get_user_by_full_name($bdd, $first_name, $last_name);
    if (!$user) {
      $errors[] = 'il faut créer le user';
      $user = add_user($bdd, $first_name, $last_name, 'client', null, null, null);
      $messages[] = 'nouvel user créé';
      $id = $bdd->lastInsertId();
    } else {
      $id = $user['id'];
    }
  }
  $messages[] = 'id récupéré' . $id;
  $new_comment = new_comment($bdd, $id, $note, $comment);
  $messages[] = 'Le commentaire a bien été envoyé';
}

foreach($errors as $error) {
  echo $error . '<br>';
}
foreach($messages as $message) {
  echo $message . '<br>';
}
header('Location: ../index.php');
exit();
