<?php


//action.php

include('../connect/database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  
  ':topic'  => $_POST['topic'],
  ':description'  => $_POST['description'],
  ':deadline'  => $_POST['deadline'],
  ':id'    => $_POST['id']
 );

 $query = "UPDATE assignment 
 SET topic = :topic, 
 description = :description, 
 deadline = :deadline
 WHERE id = :id
 ";


 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}
 
if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM assignment 
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>