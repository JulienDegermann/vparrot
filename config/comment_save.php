<?php
require_once '../data_base/data_base_connect.php';
require_once '../classes/class_comments.php';
//get the user id, then SQL to delete DB
$id = $_GET['id'];

$id = substr($id, strlen('save-'));

Comments::validate_comment_by_id($bdd, $id);



