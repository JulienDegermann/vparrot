<?php
require_once '../data_base/data_base_connect.php';
require_once '../classes/class_users.php';
//get the user id, then SQL to delete DB
$id = $_GET['id'];
$id = explode('-', $id)[1];
delete_user_by_id($bdd, $id);