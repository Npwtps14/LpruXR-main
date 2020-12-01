<?php


  if (isset($_POST['saveassign'] )) {
 
  $row = $getdata->my_sql_num_row($connect,"assignment","`topic`='".$_POST['topic']."' AND `register_id`='".$_POST['s_group']."' ");

  if($row <= 0){
  $getdata->my_sql_insert($connect,"assignment","
  `register_id`='".$_POST['s_group']."'
  ,`topic`='".$_POST['topic']."'
  ,`description`='".$_POST['desc']."'
  ,`deadline`='".$_POST['deadline']."' 
  " ); 
  }else{
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ  !');";
    echo "window.history.back();";
    echo "</script>";
  }
}
?>

<section class="section has-background-grey-light">
<div class="column  table-wrapper-scroll-y my-custom-scrollbar ">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table id="assign_data" class="table is-fullwidth is-scrollable  is-bordered is-striped   ">
            <thead>
              <tr>
                <th>ID</th>
                <th>Term</th>
                <th>Subject</th>
                <th>Group</th>
                <th>Topic</th>
                <th>Description</th>
                <th>Deadline</th>              
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" data-backdrop="false">
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
                  $records = $getdata->my_sql_select($connect, "DISTINCT term", "register", "user_id =" . $users->ID . "  ");
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
            <div class="field">
              <label class="label level-left">Description</label>
              <div class="control">
                <textarea name="desc" class="textarea" placeholder="รายละเอียดงาน"></textarea>
              </div>
            </div>
            <div class="field">
              <label class="label level-left">Deadline</label>
              <div class="control">
                <input name="deadline" class="input" type="date">
              </div>
            </div>

            <div class=" has-aside-left has-fixed-size has-max-width">
              <div class="field is-grouped">
                <div class="control">
                  <button type="submit" name="saveassign" class="button is-success">Submit</button>
                </div>
                <div class="control">
                  <button type="close" class="button is-link is-light">Cancel</button>
                </div>
              </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript" language="javascript">
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



      xmlhttp.open("GET", "dist/assign/ajax/get.subject.assign.php?users=<?php echo $users->ID; ?>&term=" + this.value, true);
      xmlhttp.send();

    });

    subject.addEventListener("change", function(event) {
      event.preventDefault();

      if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari 
        // xmlhttp = new XMLHttpRequest(async);
        httpReq = new XMLHttpRequest();
      } else { // code for IE6, IE5
        httpReq = new ActiveXObject("Microsoft.XMLHTTP");
      }

      httpReq.onreadystatechange = function() {
        if (httpReq.readyState == 4 && httpReq.status == 200) {
          var JsonsGroup = JSON.parse(httpReq.responseText);

          s_group.innerHTML = " <option require></option>";
          $.each(JsonsGroup, function(key, value) {
            var option = document.createElement("option");
            option.setAttribute("value", key);
            option.text = value;
            s_group.appendChild(option);

          });

        }
      }

      httpReq.open("GET", "dist/assign/ajax/get.s_group.assign.php?users=<?php echo $users->ID; ?> &term=" + term.value + "&subject="+ this.value, true);
      httpReq.send();

    });

  })();
  
  var dataTable = $('#assign_data').DataTable({
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : {
   url:"dist/assign/fetch_assignment.php",
   type:"POST"
  }
});

$('#assign_data').on('draw.dt', function(){
 $('#assign_data').Tabledit({
  url:'dist/assign/action_assignment.php',
  dataType:'json',
  columns:{
   identifier : [0, 'id'],
   editable:[
     [1, 'term'],
     [2, 'subject_name'], 
     [3, 's_group'],
     [4, 'topic'], 
     [5, 'description'],
     [6, 'deadline'] ]
  },
  restoreButton:false,
  onSuccess:function(data, textStatus, jqXHR)
  {
   if(data.action == 'delete')
   {
    // url:'dist/assign/action_assignment.php',
    $('#' + data.id).remove();
    $('#assign_data').DataTable().ajax.reload();
   }
  }
 });
});
 
</script>