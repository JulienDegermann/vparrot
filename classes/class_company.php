<?php


// Class Company {

// }

function get_all_informations(PDO $bdd)
{
  $sql = "SELECT company.*, address.id AS address_id, address.name, address.street_number, address.street_name, address.zip_code, address.city FROM company JOIN address;";
  $stmt = $bdd->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}

function update_company_informations(
  PDO $bdd,
  string $company_email,
  string $company_name,
  string $company_tel,
  string $city,
  int $street_number,
  string $street_name,
  int $zip_code
) {
  $company_id = 1;
  $sql = "UPDATE company 
  JOIN address ON company.address_id = address.id 
  SET company.phone = :company_tel, 
      company.email = :company_email, 
      address.name = :company_name, 
      address.street_number = :street_number, 
      address.street_name = :street_name, 
      address.city = :city,
      address.zip_code = :zip_code
  WHERE company.id = :company_id ;";
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':company_tel', $company_tel, PDO::PARAM_STR);
  $stmt->bindParam(':company_email', $company_email, PDO::PARAM_STR);
  $stmt->bindParam(':company_name', $company_name, PDO::PARAM_STR);
  $stmt->bindParam(':street_number', $street_number, PDO::PARAM_INT);
  $stmt->bindParam(':street_name', $street_name, PDO::PARAM_STR);
  $stmt->bindParam(':city', $city, PDO::PARAM_STR);
  $stmt->bindParam(':company_id', $company_id, PDO::PARAM_INT);
  $stmt->bindParam(':zip_code', $zip_code, PDO::PARAM_INT);
  $result = $stmt->execute();
  $stmt = null;
  return $result;
}

function update_openings(
  PDO $bdd,
  int $i,
  string $am_opening,
  string $am_closure,
  string $pm_opening,
  string $pm_closure
) {
  $sql = 'UPDATE openings 
    SET am_opening = :am_opening,
        am_closure = :am_closure,
        pm_opening = :pm_opening,
        pm_closure = :pm_closure
    WHERE id = :id;';
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':am_opening', $am_opening, PDO::PARAM_STR);
  $stmt->bindParam(':am_closure', $am_closure, PDO::PARAM_STR);
  $stmt->bindParam(':pm_opening', $pm_opening, PDO::PARAM_STR);
  $stmt->bindParam(':pm_closure', $pm_closure, PDO::PARAM_STR);
  $stmt->bindParam(':id', $i, PDO::PARAM_INT);
  $result = $stmt->execute();
  $stmt = null;
  return $result;
}


// CRUD services
function update_services(
  PDO $bdd,
  int $id,
  string $title,
  string $content
) {
  $sql = 'UPDATE services 
            SET title = :title,
                content = :content
            WHERE id = :id;';
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':title', $title, PDO::PARAM_STR);
  $stmt->bindParam(':content', $content, PDO::PARAM_STR);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $result = $stmt->execute();
  $stmt = null;
  return $result;
}

function delete_service(
  PDO $bdd,
  int $id
) {
  $sql = 'DELETE * FROM services WHERE id = :id;';
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $result = $stmt->execute();
  $stmt = null;
  return $result;
}

function add_service(
  PDO $bdd,
  string $title,
  string $content
) {
  $sql = 'INSERT INTO services (title, content) VALUES (:title, :content);';
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':title', $title, PDO::PARAM_STR);
  $stmt->bindParam(':content', $content, PDO::PARAM_STR);
  $result = $stmt->execute();
  $stmt = null;
  return $result;
}

function get_services (PDO $bdd) {
  $sql = 'SELECT * FROM services;';
  $stmt = $bdd->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}


function get_openings ($bdd) {
  $sql = 'SELECT * FROM openings;';
  $stmt = $bdd->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}