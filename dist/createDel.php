<?PHP
$DEL = $_REQUEST['ID'];
include "connectDB.php";
$dsql = "DELETE FROM assignment WHERE assignment_id = $DEL";
$sql = mysqli_query($dbconnect,$dsql);
if ($sql)
{
	
	echo "<meta http-equiv='refresh' content='1;url=create.php' />";
}
else
{
	echo "Delete Error";
	echo "<meta http-equiv='refresh' content='2;url=create.php' />";
}
?>
