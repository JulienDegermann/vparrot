<?php
require_once '../data_base/data_base_connect.php';
session_start();


if (isset($_POST['company_name'])) {
  $company_name = trim($_POST['company_name']);
}
if (isset($_POST['company_tel'])) {
  $company_tel = trim($_POST['company_tel']);
}
if (isset($_POST['company_email'])) {
  $company_email = trim($_POST['company_email']);
}
if (isset($_POST['street_number'])) {
  $street_number = trim($_POST['street_number']);
}
if (isset($_POST['street_name'])) {
  $street_name = trim($_POST['street_name']);
}
if (isset($_POST['city'])) {
  $city = trim($_POST['city']);
}
if (isset($_POST['zip_code'])) {
  $zip_code = trim($_POST['zip_code']);
}

// openings
for ($i = 1; $i < 8; $i++) {

  $name1 = 'am_opening_' . $i;
  $name2 = 'am_closure_' . $i;
  $name3 = 'pm_opening_' . $i;
  $name4 = 'pm_closure_' . $i;
  global $$name1;
  global $$name2;
  global $$name3;
  global $$name4;

  if (isset($_POST['am_opening_'.$i])) {
    $$name1 = $_POST['am_opening_'.$i];
  }
  if (isset($_POST['am_closure_'.$i])) {
    $$name2 = $_POST['am_closure_'.$i];
  }
  if (isset($_POST['pm_opening_'.$i])) {
    $$name3 = $_POST['pm_opening_'.$i];
  }
  if (isset($_POST['pm_closure_'.$i])) {
    $$name4 = $_POST['pm_closure_'.$i];
  }
}

$error = '';

$req = "SELECT * FROM company JOIN address ON company.address_id = address.id";
$_SESSION['error'] = '';
foreach ($bdd->query($req) as $company) {
  if ($company_name === '' || $company_tel === '' || $company_email === '' || $street_number === '' || $street_name === '' || $city === '' || $zip_code === '') {
    $error = 'un champ n\'est pas rempli';
  }
  if ($error != '') {
    $_SESSION['error'] = $error;
    $bdd = null;
  } else {
    $save = "UPDATE company 
    JOIN address ON company.address_id = address.id 
    SET company.phone = '$company_tel', 
        company.email = '$company_email', 
        address.name = '$company_name', 
        address.street_number = '$street_number', 
        address.street_name = '$street_name', 
        address.city = '$city' 
    WHERE company.id = 1 ;";
    $bdd->query($save);
  }
}

$req = "SELECT * FROM openings";
foreach ($bdd->query($req) as $opening) {
  for ($i = 1; $i < 8; $i++) {
    $am_opening_variable = 'am_opening_' . $i;
    $am_closure_variable = 'am_closure_' . $i;
    $pm_opening_variable = 'pm_opening_' . $i;
    $pm_closure_variable = 'pm_closure_' . $i;

    $save = "UPDATE openings
      SET am_opening = '{$$am_opening_variable}', 
          am_closure = '{$$am_closure_variable}', 
          pm_opening = '{$$pm_opening_variable}', 
          pm_closure = '{$$pm_closure_variable}'
      WHERE id = {$i}";
    $bdd->query($save);
  }
}
$bdd = null;


header('Location: ../admin.php');
