<?php
session_start();
require_once '../data_base/data_base_connect.php';
require_once '../classes/class_comments.php';
require_once '../classes/class_users.php';

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


$id = null;

$user = Users::get_user_by_full_name($bdd, $first_name, $last_name);
$user ? $id = $user['id'] : $id = null;

if ($id === null) {
  $user = Users::insert_new_user($bdd, $first_name, $last_name, 'client', null, null);
  $id = $bdd->lastInsertId();
  $new_comment = Comments::insert_comment($bdd, $id, $note, $comment);
}

header('Location: ../index.php');
exit();
