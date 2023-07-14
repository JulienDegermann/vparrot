<?php
require_once '../lib/workshop_datas.php';
require_once '../lib/users.php';
require_once '../lib/cars_list.php';

$fields = [
  'company_name',
  'company_tel',
  'company_email',
  'street_number',
  'street_name',
  'city',
  'zip_code',
  'street_number',
  'employee_first_name',
  'employee_last_name',
  'employee_password',
  'employee_email',
  'client_first_name',
  'client_last_name',
  'brand',
  'model',
  'year',
  'mileage',
  'price',
  'main_picture'
];


foreach ($fields as $field) {
  if (isset($_POST[$field])) {
    $$field = $_POST[$field];
  }
};

header('Location: ../admin.php');
