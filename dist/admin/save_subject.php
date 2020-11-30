<meta charset="utf-8">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lprux";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection

	$Subj = $_POST["subject_id"];

	$check = "
	SELECT  subject_id 
	FROM subject  
	WHERE subject_id = '$Subj ' 
	";
    $result1 = mysqli_query($conn, $check) or die(mysqli_connect_error());
    $num=mysqli_num_rows($result1);

    if($num > 0)
    {
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ  !');";
    echo "window.history.back();";
    echo "</script>";
    }else{
	
        $sql = "INSERT INTO subject (
            id,
            subject_id,
            subject_name,
            credit)
           VALUES (NULL,
             '$Subj',
             '$_POST[subject_name]', 
             '$_POST[credit]')";
           
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_connect_error());

}
	mysqli_close($conn);
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'http://localhost/LpruXR-main/?page=add_subject'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'http://localhost/LpruXR-main/?page=add_subject'; ";
	echo "</script>";
}
?>