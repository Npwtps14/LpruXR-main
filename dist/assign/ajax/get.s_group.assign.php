<?php
include("../../teacher/connect.core.php");

$getdata = new clear_db();
$connect = $getdata->connect();


$sgroup = $getdata->my_sql_select($connect, null, "register", "user_id =".$_GET['users']." AND term='".$_GET['term']."' AND subject_id='".$_GET['subject']."'  ");
while ($datasgroup = mysqli_fetch_object($sgroup)) {

    //$getSgroup = $getdata->my_sql_query($connect,null,"subject","s_group='".$dataSgroup->s_group."' ");
    //$datasubject; 
   
    $json[$datasgroup->r_id] = $datasgroup->s_group; 

}



echo json_encode($json);
?>