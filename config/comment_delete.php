<?php
require_once '../data_base/data_base_connect.php';
require_once '../classes/class_comments.php';
//get the user id, then SQL to delete DB
$id = $_GET['id'];
var_dump($id);
$id = explode('-', $id)[1];
var_dump($id);
delete_comment_by_id($bdd, $id);
// header('location: ../admin.php');