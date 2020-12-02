<?php

//action.php

include('../connect/database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':subject_id'  => $_POST['subject_id'],
  ':subject_name'  => $_POST['subject_name'],
  ':credit'  => $_POST['credit'],
  ':r_id'    => $_POST['r_id']
 );

 $query = "
 UPDATE subject 
 SET subject_id = :subject_id, 
 subject_name = :subject_name,  
 credit = :credit
 WHERE subject_id = :subject_id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM register 
 WHERE r_id = '".$_POST["r_id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>