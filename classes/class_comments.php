<?php
class Comments
{
  public $id;
  public $first_name;
  public $last_name;
  public $note;
  public $comment;

  public function __construct($id, $first_name, $last_name, $note, $comment)
  {
    // Assigner les valeurs des paramètres aux propriétés correspondantes
    $this->id = $id;
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
  static function insert_comment($bdd, $user_id, $note, $comment)
  {
    $sql = "INSERT INTO comments (note, comment, user_id)
    VALUES (:note, :comment, :user_id);";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':note', $note, PDO::PARAM_INT);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;
  }

  static function get_comment_by_id($bdd, $id)
  {
    $sql = "SELECT * FROM comments WHERE id = :id;";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;
    return $result;
  }

  static function delete_comment_by_id($bdd, $id)
  {
    $sql = "DELETE FROM comments WHERE id = :id;";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    // $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;
    // return $result;
  }

  static function get_all_new_comments($bdd)
  {
    $sql = "SELECT comments.*, users.id AS user_id, users.first_name, users.last_name FROM comments 
            JOIN users ON users.id = comments.user_id 
            WHERE is_checked IS NULL;";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
    return $result;
  }

  static function get_all_valid_comments($bdd)
  {
    $sql = "SELECT * FROM comments JOIN users ON users.id = comments.user_id WHERE is_checked = 1;";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
    return $result;
  }

  static function validate_comment_by_id($bdd, $id)
  {
    $sql = "UPDATE comments SET is_checked = 1 WHERE id = :id;";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
    return $result;
  }
}
