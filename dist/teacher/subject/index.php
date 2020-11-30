<?php


include("../connect.core.php");

$getdata = new clear_db();
$connect = $getdata->connect();

$subject = $getdata->my_sql_select($connect,null,"subject",null);
?>
<div class="form-group">
  <select class="form-control " data-width="100%" id="subject_id" name="subject_id" data-container="body">
    <?php
    while ($rowsubject = mysqli_fetch_object($subject)) {
    $row = $getdata->my_sql_query($connect,null,"subjectofteacher","teacher_id=".$_GET['key']." AND subject_id=".$rowsubject->id." ");
      if(@$row->active == ""){
    ?>
        <option value="<?php echo $rowsubject->id;?>" ><?php echo $rowsubject->subject_id.' : '.$rowsubject->subject_name;?></option>
    <?php
      } 

    }
    ?>
  </select>
</div>
