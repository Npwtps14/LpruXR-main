<?PHP
$DEL = $_REQUEST['ID'];
include "connectDB.php";
$dsql = "DELETE FROM register WHERE r_id = $DEL";
$sql = mysqli_query($dbconnect,$dsql);
if ($sql)
{
	
	echo "<meta http-equiv='refresh' content='1;http://localhost/LpruXR-main/?page=add_teacher' />";
}
else
{
	echo "Delete Error";
	echo "<meta http-equiv='refresh' content='2;http://localhost/LpruXR-main/?page=add_teacher' />";
}
?>
