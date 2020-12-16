<?php

//action.php

include('../connect/database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':s_group'  => $_POST['s_group'],
  ':term'  => $_POST['term'],
  ':r_id'    => $_POST['r_id']
 );

 $query = "UPDATE register 
 SET s_group = :s_group, 
 term = :term
 WHERE r_id = :r_id
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