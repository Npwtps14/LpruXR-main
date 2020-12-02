<?php
// session_start(); //assignStatusModal
?>
<section class="section  has-background-grey-light ">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Topic</th>
        <th scope="col">Subject</th>
        <th scope="col">Group</th>
        <th scope="col">student</th>
        <th scope="col">Assign</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $assignStatus = $getdata->my_sql_select($connect, "a.*,b.*,c.subject_name,(SELECT COUNT(student_id) FROM tracking WHERE assign_id=b.id ) AS sum_as,(SELECT COUNT(student_id) FROM student WHERE s_group=a.s_group AND `status`='exist') as sum_st", "`register` a INNER JOIN assignment b ON(a.r_id=b.register_id) LEFT JOIN subject c ON(a.subject_id=c.subject_id)", " a.user_id='" . @$users->ID . "' ");
      while ($rowstatus = mysqli_fetch_object($assignStatus)) {

      ?>
        <tr>
          <th scope="row"><?php echo $rowstatus->id; ?></th>
          <td><?php echo $rowstatus->topic; ?></td>
          <td><?php echo $rowstatus->subject_name; ?></td>
          <td><?php echo $rowstatus->s_group; ?></td>
          <td><?php echo $rowstatus->sum_st; ?></td>
          <td><?php echo $rowstatus->sum_as; ?></td>
          <td scope="row" align="center" valign="middle">
            <button type="button" class="btn btn-outline-success btn-sm" onClick=" javascript:ToggleStudent('<?php echo @$rowstatus->id; ?>');"><i class="fa fa-check"></i> ส่งงาน</button>
          </td>
        </tr>
        <tr id="hidden<?php echo $rowstatus->id; ?>" style="display:hidden;">
          <td colspan="7" valign="middle">
            <table width="100%">
              <tbody>
                <?php
                $student = $getdata->my_sql_select($connect, null, "student", "s_group='" . $rowstatus->s_group . "' AND `status`='exist' ");
                while ($rowStudent = mysqli_fetch_object($student)) {
                  $checkStatus =  $getdata->my_sql_query($connect,null,"tracking","student_id='".$rowStudent->student_id."' AND assign_id='".$rowstatus->id."' ");
                ?>
                  <tr>
                    <td width="10%"><?php echo $rowStudent->student_id; ?></td>
                    <td width="80%"><?php echo $rowStudent->student_name; ?></td>
                    <td width="10%">
                      <?php
                        if(@$checkStatus->id !=""){
		                      echo '<button type="button" class="btn btn-outline-success btn-sm" id="btn-'.@$checkStatus->id.'" onClick="javascript:changeStatusTracking(\''.@$checkStatus->id.'\');"><i class="fa fa-check" aria-hidden="true" id="icon-'.@$checkStatus->id.'"></i> <span id="text-'.@$checkStatus->id.'">ส่งแล้ว</span></button>';
	                     }else{
		                      echo '<button type="button" class="btn btn-outline-danger btn-sm" id="btn-'.@$checkStatus->id.'" onClick="javascript:changeStatusTracking(\''.@$checkStatus->id.'\');"><i class="fa fa-times-circle-o" aria-hidden="true" id="icon-'.@$checkStatus->id.'"></i> <span id="text-'.@$checkStatus->id.'">ไม่ส่ง</span></button>';
	                      }
                      ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </td>
        </tr>

      <?php } ?>
    <tbody>
  </table>
</section>
<div class="modal fade" id="assignStatusModal" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="modal-header">
          <h5 class="modal-title field label  has-background-black has-text-white-ter ">Assignment Details</h5>

        </div>
        <div class="modal-body">
          <div class="field">
            <label class="label level-left">Term</label>
            <div class="control">
              <div class="select is-fullwidth">
                <select name="term" id="term">
                  <option require></option>
                  <?php
                  $records = $getdata->my_sql_select($connect, "DISTINCT term", "register", "user_id =" . $users->ID . " ");
                  while ($dataregister = mysqli_fetch_object($records)) {
                    echo "<option value='" . $dataregister->term . "'>" . $dataregister->term . "</option>";  // displaying data in option menu
                  }

                  ?>
                </select>


              </div>
            </div>
          </div>
          <div class="field">
            <label class="label level-left">Subject</label>
            <div class="control">
              <div class="select is-fullwidth">
                <select name="subject" id="subject">
                  <option require></option>
                </select>
              </div>
            </div>
          </div>

          <div class="field">
            <label class="label level-left">Group</label>
            <div class="control">
              <div class="select is-fullwidth">
                <select name="s_group" id="s_group">
                  <option require></option>
                </select>
              </div>
            </div>
          </div>

          <div class="field">
            <div class="field">
              <label class="label level-left">Topic</label>
              <div class="control">
                <input name="topic" class="input" type="text">
              </div>
            </div>
          </div>

          <div class=" has-aside-left has-fixed-size has-max-width">
            <div class="field is-grouped">
              <div class="control">
                <button type="submit" name="searchassign" class="button is-success">SEARCH</button>
              </div>
              <div class="control">

                <button type="button" class="button is-link is-light" data-dismiss="modal"> Close</button>
              </div>
            </div>
      </form>
    </div>
  </div>
</div>

<?php
//   if(isset($_POST['searchstatus'])){
//     $resultassign = $getdata->my_sql_select($connect,"assignment") 
//   }



?>

<script>
  (function() {
    var term = document.getElementById("term");
    var subject = document.getElementById('subject');
    var s_group = document.getElementById('s_group');

    term.addEventListener("change", function(event) {
      event.preventDefault();

      //console.log(this.value); 

      if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari 
        xmlhttp = new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }

      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          var JsonSubject = JSON.parse(xmlhttp.responseText);
          subject.innerHTML = " <option require></option>";
          $.each(JsonSubject, function(key, value) {

            var option = document.createElement("option");
            option.setAttribute("value", key);
            option.text = value;
            subject.appendChild(option);

          });
        }
      }



      xmlhttp.open("GET", "dist/assign/ajax/get.group.assign.php?users=<?php echo $users->ID; ?>&term=" + this.value, true);
      xmlhttp.send();

    });

    // subject.addEventListener("change", function(event) {
    //   event.preventDefault();

    //   if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari 
    //     // xmlhttp = new XMLHttpRequest(async);
    //     httpReq = new XMLHttpRequest();
    //   } else { // code for IE6, IE5
    //     httpReq = new ActiveXObject("Microsoft.XMLHTTP");
    //   }

    //   httpReq.onreadystatechange = function() {
    //     if (httpReq.readyState == 4 && httpReq.status == 200) {
    //       var JsonsGroup = JSON.parse(httpReq.responseText);

    //       s_group.innerHTML = " <option require></option>";
    //       $.each(JsonsGroup, function(key, value) {
    //         var option = document.createElement("option");
    //         option.setAttribute("value", key);
    //         option.text = value;
    //         s_group.appendChild(option);

    //       });

    //     }
    //   }

    //   httpReq.open("GET", "dist/assign/ajax/get.s_group.assign.php?users=<?php echo $users->ID; ?> &term=" + term.value + "&subject="+ this.value, true);
    //   httpReq.send();

    // });










  });

</script>

<script language="javascript">
    function changeStatusTracking(unitkey){
    	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
    	 	xmlhttp=new XMLHttpRequest();
    	}else{// code for IE6, IE5
      		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    	}
      var es = document.getElementById('btn-'+unitkey);
      
    	if(es.className == 'btn btn-outline-success btn-sm'){
    		var sts= 'yes';
    	}else{
    		var sts= 'no';
    	}
    	xmlhttp.onreadystatechange=function(){
      		if (xmlhttp.readyState==4 && xmlhttp.status==200){
    			  if(es.className == 'btn btn-outline-success btn-sm'){
    			  	document.getElementById('btn-'+unitkey).className = 'btn btn-outline-danger btn-sm';
    			  	document.getElementById('icon-'+unitkey).className = 'fa fa-times';
    			  	document.getElementById('text-'+unitkey).innerHTML = 'ไม่สอน';
    			  }else{
    			  	document.getElementById('btn-'+unitkey).className = 'btn btn-outline-success btn-sm';
    			  	document.getElementById('icon-'+unitkey).className = 'fa fa-check';
    			  	document.getElementById('text-'+unitkey).innerHTML = 'สอน';
    			  }
      		}
    	}

    	xmlhttp.open("GET","functions.php?type=change_tracking_status&key="+unitkey+"&sts="+sts,true);
    	xmlhttp.send();
    }

  </script>