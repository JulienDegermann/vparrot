<?php // logout file

session_unset();
session_destroy();
// header('Location: login.php');