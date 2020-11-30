<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lprux";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if($_POST['s_group'] !="" &&  
$_POST['term'] !="" &&  
$_POST['subject_id'] !="" && 
$_POST['user_id'] !="" ){

  $rid = md5(implode(",",$_POST)); 

  $sql = "INSERT INTO register 
  SET r_id = '".$rid."',
  s_group= '".$_POST['s_group']."',
  term= '".$_POST['term']."',
  subject_id= '".$_POST['subject_id']."',
  user_id= '".$_POST['user_id']."'

  ON DUPLICATE KEY UPDATE 
  s_group= '".$_POST['s_group']."',
  term= '".$_POST['term']."',
  subject_id= '".$_POST['subject_id']."',
  user_id= '".$_POST['user_id']."' "; 

if (mysqli_query($conn, $sql)) {
    echo "<meta http-equiv='refresh' content='2;url=http://localhost/LpruXR-main/?page=add_register' />";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}else{
  echo "<meta http-equiv='refresh' content='2;url=http://localhost/LpruXR-main/?page=add_register' />";
}

mysqli_close($conn);
?>