<?php


//action.php

include('../connect/database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':subject_id'  => $_POST['subject_id'],
  ':subject_name'  => $_POST['subject_name'],
  ':credit'  => $_POST['credit'],
  ':id'    => $_POST['id']
 );

 $query = "UPDATE subject 
 SET subject_id = :subject_id, 
 subject_name = :subject_name,  
 credit = :credit
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM subject 
 WHERE subject_id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>