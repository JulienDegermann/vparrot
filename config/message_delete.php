<?php

require_once '../data_base/data_base_connect.php';
require_once '../classes/class_messages.php';
$id=$_GET['id'];
$id = explode('-', $id)[1];
var_dump($id);

delete_message_by_id($bdd, $id);