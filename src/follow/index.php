<section class="section is-title-bar  has-background-black ">
  <div class="level">
    <div class="level-left">
      <div class="level-item">
        <ul>
          <li class="has-text-white">Home</li>
          <li class="has-text-white">Tracking Assignment</li>
        </ul>
      </div>
    </div>
    <div class="level">
      <div class="level-right">
        <div class="level-item">  
            <p class=" has-text-light is-bold label"> 
              <?php
              error_reporting(0);
              $getdata->my_sql_query($connect, null, "user", "ID=" . $_SESSION['user_id'] . ".ID=" . $_SESSION['Username'] .  " "  . ".ID=" . $_SESSION['Fullname'] .  " ");
              echo $_SESSION['Username'];
              echo "<br>";
              ?>
            </p>   
        </div>
        <br>
       
          <div class=" has-text-light "> 
            <?php
            echo $_SESSION['Fullname'];
            echo "<br>";
            ?>
          </div>
       
      </div>
    </div>
</section>
<?php
// session_start(); //assignStatusModal
?>
<section class="section has-background-grey-lighter ">
    <table class="table s-bordered is-striped is-narrow is-hoverable is-fullwidth" width="100%" class="table table-hover">
        <thead>
            <tr class="">
                <th class=" has-background-grey-light" scope="col">Subject</th>
                <th class=" has-background-grey-light" scope="col">Topic</th>
                <th class=" has-background-grey-light" scope="col">Group</th>
                <th class=" has-background-grey-light" scope="col">Student</th>
                <th class=" has-background-grey-light" scope="col">Complete</th>
                <th class=" has-background-grey-light" scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $assignStatus = $getdata->my_sql_select($connect, "a.*,b.*,c.subject_name,(SELECT COUNT(student_id) FROM tracking WHERE assign_id=b.id ) AS sum_as,(SELECT COUNT(student_id) FROM student WHERE s_group=a.s_group AND `status`='exist') as sum_st", "`register` a INNER JOIN assignment b ON(a.r_id=b.register_id) LEFT JOIN subject c ON(a.subject_id=c.subject_id)", " a.user_id");
            while ($rowstatus = mysqli_fetch_object($assignStatus)) {

            ?>
                <tr>
                    <!-- <th class=" has-text-dark has-background-primary" scope="row"><?php echo $rowstatus->id; ?></th> -->
                    <td class=" has-text-dark has-background-primary"><?php echo $rowstatus->subject_name; ?></td>
                    <td class=" has-text-dark has-background-primary"><?php echo $rowstatus->topic; ?></td>
                    <td class=" has-text-dark has-background-primary"><?php echo $rowstatus->s_group; ?></td>
                    <td class=" has-text-dark has-background-primary"><?php echo $rowstatus->sum_st; ?></td>
                    <td class=" has-text-dark has-background-primary"><?php echo $rowstatus->sum_as; ?></td>
                    <td scope="row" valign="middle">
                        <button type="button" class="button is-success " onClick=" javascript:ToggleStudent('<?php echo @$rowstatus->id; ?>');">
                            <i class="fa fa-bars"></i>&nbsp;ดูสถานะการส่งงาน
                        </button>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" valign="middle">
                    <div class="card has-background-grey">               
                    <p class="label border level-left has-background-light">
                      Description
                    </p>                  
                      <p id="desc1" class="label content level-left has-background-light " contenteditable="false">
                        <?php echo  $rowstatus->description;   ?>
                      </p>                 
                </div>  
                        <!--  -->
                        <div class=" has-background-grey-dark">
                            <p class=" has-text-grey-dark">.</p>
                        </div>
                        <table class="table s-bordered is-striped is-narrow is-hoverable is-fullwidth" width="100%" id="hidden<?php echo $rowstatus->id; ?>" style="display: none;">
                            <tbody>
                                <?php
                                $student = $getdata->my_sql_select($connect, null, "student", "s_group='" . $rowstatus->s_group . "' AND `status`='exist' ");
                                while ($rowStudent = mysqli_fetch_object($student)) {
                                    $checkStatus =  $getdata->my_sql_query($connect, null, "tracking", "student_id='" . $rowStudent->student_id . "' AND assign_id='" . $rowstatus->id . "' ");
                                ?>
                                    <tr>
                                        <td width="10%"><?php echo $rowStudent->student_id; ?></td>
                                        <td width="70%"><?php echo $rowStudent->student_name; ?></td>
                                        <td width="10%" id="td-<?php echo $rowStudent->student_id . '-' . $rowstatus->id; ?>">
                                            <?php if (@$checkStatus->id != "") {
                                                echo "ส่งแล้ว";
                                            } else {
                                                echo "ยังไม่ส่ง";
                                            }
                                            ?>
                                        </td>
                                        <td width="10%">
                                            <?php

                                            if (@$checkStatus->id != "") {
                                                echo '<button type="button" class="button is-success" id="btn-' . $rowStudent->student_id . '-' . $rowstatus->id . '" (\'' . $rowStudent->student_id . '-' . $rowstatus->id . '\');"><i class="fa fa-check" aria-hidden="true" id="icon-' . $rowStudent->student_id . '-' . $rowstatus->id . '"></i> <span id="text-' . $rowStudent->student_id . '-' . $rowstatus->id . '"></span></button>';
                                            } else {
                                                echo '<button type="button" class="button is-danger" id="btn-' . $rowStudent->student_id . '-' . $rowstatus->id . '"(\'' . $rowStudent->student_id . '-' . $rowstatus->id . '\');"><i class="fa fa-times-circle-o " aria-hidden="true" id="icon-' . $rowStudent->student_id . '-' . $rowstatus->id . '"></i> <span id="text-' . $rowStudent->student_id . '-' . $rowstatus->id . '"></span></button>';
                                            }
                                            ?>
                                        </td>
                                        </div>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            <?php } ?>
        <tbody>
    </table>
<br><br><br>
</script>

<script language="javascript">
    function changeStatusTracking(unitkey) {
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var es = document.getElementById('btn-' + unitkey);

        if (es.className == 'button is-success') {
            var sts = 'yes';
        } else {
            var sts = 'no';
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (es.className == 'button is-success') {
                    document.getElementById('btn-' + unitkey).className = 'button is-danger';
                    document.getElementById('icon-' + unitkey).className = 'fa fa-check ';
                    document.getElementById('text-' + unitkey).innerHTML = 'ยกเลิกส่งงาน';
                    document.getElementById('td-' + unitkey).innerHTML = 'ส่งแล้ว';
                } else {
                    document.getElementById('btn-' + unitkey).className = 'button is-success ';
                    document.getElementById('icon-' + unitkey).className = 'fa fa-times-circle-o';
                    document.getElementById('text-' + unitkey).innerHTML = 'คลิกส่งงาน';
                    document.getElementById('td-' + unitkey).innerHTML = 'ยังไม่ส่ง';
                }
            }
        }

        xmlhttp.open("GET", "dist/assign/ajax/change.tracking.status.php?key=" + unitkey + "&sts=" + sts, true);
        xmlhttp.send();
    }

    function ToggleStudent(idtb) {
        var x = document.getElementById('hidden' + idtb);
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

</section>

