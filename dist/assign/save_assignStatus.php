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


$sql =  "UPDATE assignment SET 
			description = '".$_POST["descEdit"]."'
			WHERE id "; 

if (mysqli_query($conn,$sql)) {
    echo "<meta http-equiv='refresh' content='2;url=http://localhost/LpruXR-main/index.php?page=assignmentStatus' />";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>