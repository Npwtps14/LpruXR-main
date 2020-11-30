<?php
    include("./config.core.php");
    include("./connect.core.php");

    $getdata = new clear_db();
    $connect = $getdata->connect();

    $teacher_id = $_GET['teacher_id'];

    if(isset($_POST['savesubject'])){
        $getdata->my_sql_insert($connect,"subjectofteacher"," `teacher_id`=".$teacher_id." , `subject_id`=".$_POST['subject_id']." , `active`='yes'  ");
    }

    $teacher = $getdata->my_sql_query($connect,null,"user","ID=".$teacher_id." ");

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Manage Teacher of subject</title>
    <style>
        body{
            font-size:11px;
        }
    </style>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php echo $teacher->Fullname;?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

    </ul>
    <div class="form-inline my-2 my-lg-0">
      <button data-whatever="<?php echo $teacher_id;?>" class="btn btn-sm btn-outline-success my-2 my-sm-0" type="button" data-toggle="modal" data-target="#exampleModal">เพิ่มรายวิชา</button>
    </div>
  </div>
</nav>
    <table class="table table-sm">
      <thead>
        <tr>

          <th scope="col">subject_id</th>
          <th scope="col">subject_name</th>
          <th scope="col">credit</th>
          <th scope="col" >status</th>
        </tr>
      </thead>
      <tbody>
<?php

    $subjectofteacher = $getdata->my_sql_select($connect,null,"subjectofteacher","teacher_id=".$teacher_id." ");
    while ($rowsubjectofteacher = mysqli_fetch_object($subjectofteacher)) {
    $subject = $getdata->my_sql_query($connect,null,"subject"," id=".$rowsubjectofteacher->subject_id." " );
    //echo $rowsubjectofteacher->id; 
?>
    <tr id="<?php echo @$rowsubjectofteacher->id;?>">

        <td scope="row"><?php echo $subject->subject_id;?></td>
        <td scope="row"><?php echo $subject->subject_name;?></td>
        <td scope="row"><?php echo $subject->credit;?></td>
        <td scope="row" align="center" valign="middle">
        <?php
	        if(@$rowsubjectofteacher->active == 'yes'){
		        echo '<button type="button" class="btn btn-outline-success btn-sm" id="btn-'.@$rowsubjectofteacher->id.'" onClick="javascript:changeStatus(\''.@$rowsubjectofteacher->id.'\');"><i class="fa fa-check" aria-hidden="true" id="icon-'.@$rowsubjectofteacher->id.'"></i> <span id="text-'.@$rowsubjectofteacher->id.'">สอน</span></button>';
	        }else{
		        echo '<button type="button" class="btn btn-outline-danger btn-sm" id="btn-'.@$rowsubjectofteacher->id.'" onClick="javascript:changeStatus(\''.@$rowsubjectofteacher->id.'\');"><i class="fa fa-eye-times" aria-hidden="true" id="icon-'.@$rowsubjectofteacher->id.'"></i> <span id="text-'.@$rowsubjectofteacher->id.'">ไม่สอน</span></button>';
	        }
        ?>
            <button type="button" class="btn btn-outline-danger btn-sm" onClick=" javascript:deleteSubject('<?php echo @$rowsubjectofteacher->id;?>');"><i class="fa fa-times"></i> ลบ</button>
        </td>
    </tr><?php } ?>
      </tbody>
    </table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="post" enctype="multipart/form-data" name="form1" id="form1">
      <div class="modal-header">
        <h5 class="modal-title">รายวิชา</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ปิด</button>
        <button type="submit" name="savesubject" class="btn btn-outline-primary">เพิ่มวิชาสอน</button>
      </div>
     </form>
    </div>
  </div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
  <script language="javascript">
    function changeStatus(unitkey){
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

    	xmlhttp.open("GET","functions.php?type=change_subject_status&key="+unitkey+"&sts="+sts,true);
    	xmlhttp.send();
    }

  function deleteSubject(unitkey){
    if(confirm("Are your sure delete?") == true){
      if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
    	 	xmlhttp=new XMLHttpRequest();
    	}else{// code for IE6, IE5
      	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    	}

      xmlhttp.onreadystatechange=function(){
      		if (xmlhttp.readyState==4 && xmlhttp.status==200){
              document.getElementById(unitkey).innerHTML = '';
          }
      }

    	xmlhttp.open("GET","functions.php?type=delete_subject&key="+unitkey,true);
    	xmlhttp.send();
    }
  }

  </script>
  <script>
      (function(){

          $("#exampleModal").on("show.bs.modal",function(event){

            var button = $(event.relatedTarget);
            var recipient = button.data('whatever');
            var dataString = 'key=' + recipient;

            var modal = $(this);

            $.ajax({
                type: "GET",
                url: "subject/index.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    $('#modal-body').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });

          })

      })();
  </script>
</html>
<?php $getdata->close($connect); ?>
