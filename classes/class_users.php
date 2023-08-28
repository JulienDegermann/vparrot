
<?php

class Users
{
  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $role;
  public $password;
  public $tel;

  public function __construct(
    int $id, 
    string $first_name, 
    string $last_name, 
    string $email, 
    string $role, 
    string|null $password = null, 
    int|null $tel = null)
  {
    $this->id = $id;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->email = $email;
    $this->role = $role;
    $this->password = $password;
    $this->tel = $tel;
  }

  function display_list()
  {
    require 'templates/users_list.php';
  }

  function display_item()
  {
    require 'templates/user_item.php';
  }
}

function get_user_by_id(PDO $bdd, int $id) {
  $sql = "SELECT * FROM users WHERE id = :id ;";
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}

function get_user_by_full_name(PDO $bdd, string $first_name, string $last_name) {
  $sql = "SELECT * FROM users WHERE first_name = :first_name AND last_name = :last_name ;";
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
  $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}

function get_user_by_email(PDO $bdd, string $email) {
  $sql = "SELECT * FROM users WHERE email = :email;";
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}


function get_employees(PDO $bdd) {
  $role='employee';
  $sql = "SELECT * FROM users WHERE role = 'employee';";
  $stmt = $bdd->prepare($sql);
  // $stmt->bindParam(':role', $role, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}

function delete_user_by_id(PDO $bdd, int $id) {
  $role='employee';
  $sql = "DELETE FROM users WHERE id = :id;";
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_STR);
  $result = $stmt->execute();
  $stmt = null;
  return $result;
}

function add_user(PDO $bdd, string $first_name, string $last_name, string $role, string|null $email, string|null $tel, string|null $password = null) {
  $sql = "INSERT INTO users (first_name, last_name, role, email, password, tel)
  VALUES (:first_name, :last_name, :role, :email, :password, :tel);";
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
  $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
  $stmt->bindParam(':role', $role, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':password', $password, PDO::PARAM_STR);
  $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}
