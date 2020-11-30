<?php
include("../../teacher/connect.core.php");

$getdata = new clear_db();
$connect = $getdata->connect();


$subject = $getdata->my_sql_select($connect, null, "register", "user_id =".$_GET['users']." AND term='".$_GET['term']."'  ");
while ($datasubject = mysqli_fetch_object($subject)) {

    $getsubject = $getdata->my_sql_query($connect,null,"subject","subject_id='".$datasubject->subject_id."' ");
    //$datasubject; 
   
    $json[$datasubject->subject_id] = $getsubject->subject_name; 

}



echo json_encode($json);
?>