<section class="section  has-background-grey-light ">
    <form id="register" action="dist/admin/save_register.php" method="post">
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Management assign</label>
            </div>
            <div class="field-body">
                <div class="field is-narrow">
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
                <div class="field is-narrow">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select class="form-control" name="subject" id="subject">
                                <option require></option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="field is-narrow">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="s_group" id="s_group">
                                <option require></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label">
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" name="searchstatus" class="button is-primary">
                                <span>SEARCH</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<?php
//   if(isset($_POST['searchstatus'])){
//     $resultassign = $getdata->my_sql_select($connect,"assignment") 
//   }



?>

<script>
   (function(){

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
