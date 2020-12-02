<?php
include("../../teacher/connect.core.php");

$getdata = new clear_db();
$connect = $getdata->connect();

$getarray = explode("-",$_GET['key']);

$student_id = $getarray[0];
$assign_id = $getarray[1];

if($_GET['sts']==="yes"){
    $getdata->my_sql_insert($connect,"tracking","id='".md5($student_id.$assign_id)."',student_id='".$student_id."',assign_id='".$assign_id."' ");
}else{
    $getdata->my_sql_delete($connect,"tracking","id='".md5($student_id.$assign_id)."' ");
}
   
?>