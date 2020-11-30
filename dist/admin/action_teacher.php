<?php

//action.php

include('../connect/database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':Username'  => $_POST['Username'],
  ':Password'  => $_POST['Password'],
  ':name_title'  => $_POST['name_title'],
  ':Fullname'  => $_POST['Fullname'],
  ':Userlevel'   => $_POST['Userlevel'],
  ':t_email'  => $_POST['t_email'],
  ':branch'  => $_POST['branch'],
  ':faculty'  => $_POST['faculty'],
  ':T_ID'  => $_POST['T_ID'],
  ':ID'    => $_POST['ID']
 );

 $query = " UPDATE user 
 SET Username = :Username, 
 Password = :Password, 
 name_title = :name_title,
 Fullname = :Fullname,
 Userlevel = :Userlevel ,
 t_email = :t_email,
 branch = :branch,
 faculty =:faculty,
 T_ID =:T_ID
 WHERE ID = :ID
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM user 
 WHERE ID = '".$_POST["ID"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>