<?php


//action.php

include('../connect/database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':term'  => $_POST['term'],
  ':subject_name'  => $_POST['subject_name'],
  ':s_group'  => $_POST['s_group'],
  ':topic'  => $_POST['topic'],
  ':description'  => $_POST['description'],
  ':deadline'  => $_POST['deadline'],
  ':id'    => $_POST['id']
 );

 $query = "
 UPDATE assignment 
 SET term = :term, 
 subject_name = :subject_name,  
 s_group = :s_group, 
 topic = :topic, 
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