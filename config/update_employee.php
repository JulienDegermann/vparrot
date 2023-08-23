<?php 
session_start();

require_once '../classes/class_users.php';
require_once '../data_base/data_base_connect.php';

$id=$_GET['id'];
$id = explode('-', $id)[1];
header('Content-Type: application/json'); // Indique que le contenu est du JSON
$user = json_encode(get_user_by_id($bdd, $id));
echo $user;


