
<?php

class Users
{

  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $role;
  public $key;

  public function __construct($id, $first_name, $last_name, $email, $role,  $key=0)
  {
    // Assigner les valeurs des paramètres aux propriétés correspondantes
    $this->id = $id;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->email = $email;
    $this->role = $role;
    $this->key = $key;
  }

  // add if (is_admin())

  function display_list()
  {
    // way to display on Admin page : look @ admin page ->
    require 'templates/users_list.php';
  }

  function display_item()
  {
    require 'templates/user_item.php';
  }


  static function get_user_by_id($bdd, $id) {
    $sql = "SELECT * FROM users WHERE id = :id ;";
    // get PDOStatement object ($stmt)
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;
    return $result;
  }

  static function get_user_by_full_name($bdd, $first_name, $last_name) {
    $sql = "SELECT * FROM users WHERE first_name = :first_name AND last_name = :last_name ;";
    // get PDOStatement object ($stmt)
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;
    return $result;
  }

  // -------------------------------------------------------------------------------------- ADD HASH FOR PASSWORD !!!!!!
  static function insert_new_user($bdd, $first_name, $last_name, $role, $email, $password) {
    $sql = "INSERT INTO users (first_name, last_name, role, email, password)
    VALUES (:first_name, :last_name, :role, :email, :password);";
    // get PDOStatement object ($stmt)
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;
    return $result;
  }

  // function login()
  // (
  // add function to check is Employee / Admin is logged in
  // ) 
}
