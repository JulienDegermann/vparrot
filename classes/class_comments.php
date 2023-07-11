<?php


class Comments
{

  public $id;
  public $author;
  public $note;
  public $comment;


  public function __construct($id, $author, $note, $comment)
  {
    // Assigner les valeurs des paramètres aux propriétés correspondantes
    $this->id = $id;
    $this->author = $author;
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
