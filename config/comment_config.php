<?php
session_start();
require_once '../data_base/data_base_connect.php';
$error = '';


if (!isset($_POST['first_name']) || !isset($_POST['last_name']) || !isset($_POST['note']) || !isset($_POST['comment'])) {
  $error = 'un champ est manquant';
  $_SESSION['error'] = $error;
  header('Location: ../index.php');
  exit();
} else {
  $note = $_POST['note'];
  $first_name = ucwords(strtolower($_POST['first_name']));
  $last_name = ucwords(strtolower($_POST['last_name']));
  $comment = $_POST['comment'];
}

echo $first_name . ' ' . $last_name;

$id = null;
$req = "SELECT id FROM users WHERE first_name = '$first_name' AND last_name = '$last_name';";

foreach ($bdd->query($req) as $user) {
  $id = $user['id'];
};


if ($id === null) {
  $req = "INSERT INTO users (first_name, last_name, role)
  VALUES ('$first_name', '$last_name', 'client');";
  $bdd->query($req);
  $id = $bdd->lastInsertId();
  var_dump('last id : ' . $id);
  $req = "INSERT INTO comments (note, comment, user_id)
  VALUES ('$note', '$comment', '$id');";
  $bdd->query($req);
  $bdd = null;
} else {
  $req = "INSERT INTO comments (note, comment, user_id)
VALUES ('$note', '$comment', '$id');";
  $bdd->query($req);
  $bdd = null;
}

header('Location: ../index.php');
exit();
