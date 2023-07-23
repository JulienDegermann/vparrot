<?php
require_once '../data_base/data_base_connect.php';
require_once '../classes/class_comments.php';
//get the user id, then SQL to delete DB
$id = $_GET['id'];
var_dump($id);
$id = substr($id, strlen('cancel-'));
var_dump($id);
Comments::delete_comment_by_id($bdd, $id);
var_dump(Comments::get_comment_by_id($bdd, $id));


