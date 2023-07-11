<?php
require_once 'lib/users.php';


$current_email = $_POST['email'];
$current_password = $_POST['password'];


$employee_mail_db = []
foreach ($users['employee'] as $employee) {
  $employee_mail_db[] = $employee['email'];
}

if (isset(in_array($curent_email, $users['admin']['email']))) {
  var_dump('le mail correspond au mail admin');
} elseif (isset(in_array($curent_email, $employee_mail_db))) {
  var_dump('le mail correspond à un mail employee');
} else {
  var_dump('l utilisateur n est pas connecté');
}

