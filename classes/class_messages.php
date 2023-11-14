<?php
class Messages
{
  public $user_id;
  public $message;
  public $title;
  public $email;
  public $first_name;
  public $last_name;
  public $id;
  public $tel;

  public function __construct(int $id, string $first_name, string $last_name, string|null $email, string $message, string|null $tel, string $title = null)
  {
    // Assigner les valeurs des paramètres aux propriétés correspondantes
    $this->id = $id;
    $this->message = $message;
    $this->title = $title;
    $this->email = $email;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->tel = $tel;

  }
  function display_list()
  {
    require 'templates/message_list.php';
  }
}

function insert_message(PDO $bdd, int $user_id, string $content, string|null $title = null)
{
  $sql = "INSERT INTO messages (title, content, user_id)
    VALUES (:title, :content, :user_id);";
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':title', $title, PDO::PARAM_STR);
  $stmt->bindParam(':content', $content, PDO::PARAM_STR);
  $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}

function delete_message_by_id($bdd, $id)
{
  $sql = "DELETE FROM messages WHERE id = :id;";
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $result = $stmt->execute();
  $stmt = null;
  return $result;
}

function get_all_new_messages(PDO $bdd)
{
  $sql = "SELECT messages.*, users.id AS user_id, users.first_name, users.last_name, users.tel, users.email FROM messages 
            JOIN users ON users.id = messages.user_id ORDER BY id DESC";
  $stmt = $bdd->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}
  // WHERE is_read IS NULL;
