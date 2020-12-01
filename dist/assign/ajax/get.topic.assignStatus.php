<?php
include("../../teacher/connect.core.php");

$getdata = new clear_db();
$connect = $getdata->connect();


$topic = $getdata->my_sql_select($connect, null, "register", "user_id =".$_GET['users']." AND term='".$_GET['term']."' AND subject_id='".$_GET['subject']."'AND topic='".$_GET['topic']."'  ");
while ($datasgroup = mysqli_fetch_object($topic)) {

    //$getSgroup = $getdata->my_sql_query($connect,null,"subject","s_group='".$dataSgroup->s_group."' ");
    //$datasubject; 
   
    $json[$datatopic->r_id] = $datatopic->topic; 

}



echo json_encode($json);
?> 