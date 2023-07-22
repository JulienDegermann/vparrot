<?php
require_once '../data_base/data_base_connect.php';
//get the user id, then SQL to delete DB
$id = $_GET['id'];
$id = substr($id, strlen('delete-'));
$req = "DELETE FROM users WHERE id='$id';";
$bdd->query($req);
