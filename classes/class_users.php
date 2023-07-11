
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

  // function login()
  // (
  // add function to check is Employee / Admin is logged in
  // ) 
}
