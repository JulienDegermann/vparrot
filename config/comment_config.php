<?php

require_once '../lib/users.php';


$clients_comment = [];
foreach ($users['client'] as $client) {
  $note = $client['note']['note'];
  $comment = $client['note']['comment'];
  $name = $client['first_name'];
  $client_comment = [
    'name' => $name,
    'note' => $note,
    'comment'=> $comment
  ];
  $clients_comment[] = $client_comment;
}




if (isset($_POST['name']) && isset($_POST['note'])) {
  $note = $_POST['note'];
  $name = $_POST['name'];

  if (isset($_POST['comment'])) {
    $comment = $_POST['comment'];
  }

  $current_client = [
    'name' => $name,
    'note' => $note,
    'comment' => $comment
  ];
}

$clients_comment[] = $current_client;
var_dump($clients_comment);


foreach ($clients_comment as $client) {
  echo 'nom : ' .  $client['name'] . ', note : ' . $client['note'] . ', commentaire :' .$client['comment']  . '<br>';
}
header('Location: ../index.php');
exit();
