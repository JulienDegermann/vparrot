<?php


class Comments
{

  public $id;
  public $first_name;
  public $last_name;
  public $note;
  public $comment;


  public function __construct($first_name, $last_name, $note, $comment)
  {
    // Assigner les valeurs des paramètres aux propriétés correspondantes
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->note = $note;
    $this->comment = $comment;
  }

  function display_list()
  {
    require 'templates/comment_list.php';
  }

  function display_item()
  {
    require 'templates/comment_item.php';
  }
}
