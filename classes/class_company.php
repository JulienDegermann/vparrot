<?php


// Class Company {

// }

function get_all_informations($bdd) {
  $sql = "SELECT company.*, address.id AS address_id, address.name, address.street_number, address.street_name, address.zip_code, address.city FROM company JOIN address;"; 
  $stmt = $bdd->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}