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

$sql = "INSERT INTO register (
  s_group,
  term,
  subject_id,
  T_ID)
 VALUES ('$_POST[s_group]', 
   '$_POST[term]', 
   '$_POST[subject_id]', 
   '$_POST[T_ID]')";

if (mysqli_query($conn, $sql)) {
    echo "<meta http-equiv='refresh' content='2;url=add_register.php' />";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>