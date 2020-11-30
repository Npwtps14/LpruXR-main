<?php

include("./connect.core.php");

$getdata = new clear_db();
$connect = $getdata->connect();

    switch(addslashes($_GET['type'])){
        case "change_subject_status" : if(addslashes($_GET['sts']) == "yes"){
                $getdata->my_sql_update($connect,"subjectofteacher","active='no' ","id=".addslashes($_GET['key'])." ");
            }else{
                $getdata->my_sql_update($connect,"subjectofteacher","active='yes' ","id=".addslashes($_GET['key'])." ");
            }
        break;
        case "delete_subject" : $getdata->my_sql_delete($connect,"subjectofteacher","id=".addslashes($_GET['key'])." "); 
        break;
        /*case "select_subject_assign" : if(isset($_GET['key'])){

        }else{

        }
        break;*/
    }
?>
