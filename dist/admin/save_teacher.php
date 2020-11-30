<meta charset="utf-8">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lprux";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection

	$Username = $_POST["Username"];

	$check = "
	SELECT  Username 
	FROM user  
	WHERE Username = '$Username' 
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
	
        $sql = "INSERT INTO user (
            ID,
            Username,
            Password,
            name_title,
            Fullname,
            Userlevel,
            t_email, 
            branch, 
            faculty,
            T_ID)
           VALUES (NULL,
             '$Username',
             '$_POST[Password]',
             '$_POST[name_title]',
             '$_POST[Fullname]', 
             '$_POST[Userlevel]', 
             '$_POST[t_email]', 
             '$_POST[branch]', 
             '$_POST[faculty]',  
             '$_POST[T_ID]')";
           
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_connect_error());

}
	mysqli_close($conn);
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'http://localhost/LpruXR-main/?page=add_teacher'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'http://localhost/LpruXR-main/?page=add_teacher'; ";
	echo "</script>";
}
?>