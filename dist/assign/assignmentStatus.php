<section class="section  has-background-grey-light ">
    <form id="register" action="dist/admin/save_register.php" method="post">
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Register details</label>
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


    






     

   });
</script>
