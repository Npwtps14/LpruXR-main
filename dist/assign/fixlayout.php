<section class="section has-background-grey-light">
  <form id="register" action="dist/admin/save_register.php" method="post">
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Assignment details</label>
      </div>
      <div class="field-body">
        <div class="field is-narrow">
          <div class="control">
            <div class="select is-fullwidth">
              <select name="s_group">
                <option value="">Subject</option>
                <?php
                include "dist/connect/connectDB.php";  // Using database connection file here
                $records = mysqli_query($dbconnect, "SELECT * FROM `register` WHERE user_id = 30 AND term = (
                  SELECT  term FROM `register` GROUP BY term ORDER BY RIGHT(term,2) DESC,term LIMIT 1 )");  // Use select query here 

                while ($data = mysqli_fetch_array($records)) {
                  echo "<option value='" . $data['r_id'] . "'>" . $data['term'] . ":" . $data['s_group'] . " " . $data['subject_id'] . "</option>";  // displaying data in option menu
                }

                // $records = $getdata->my_sql_select($connect, null, "student", null);
                // while ($data = mysqli_fetch_object($records)) {
                //   echo "<option value='" . $data->s_group . "'>" . $data->s_group . "</option>";  // displaying data in option menu
                // }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="field is-narrow">
          <div class="control">
            <div>

            </div>
            <div class="select is-fullwidth">

              <select name="subject_id">
                <option value="" selected>Group/Term</option>
                <?php
                $records = $getdata->my_sql_select($connect, null, "register", null);
                while ($data = mysqli_fetch_object($records)) {
                  echo "<option value='" . $data->r_id . "'>
                   " . $data->s_group . ":" . $data->term . ":" . $data->subject_id . " :" . $data->subject_name . " 
                   </option>";  // displaying data in option menu
                }
                ?>
              </select>
            </div>
          </div>
        </div>

        <div class="field is-narrow">
          <div class="control">
            <div class="select is-fullwidth">
              <select name="user_id">
                <option value="">Teacher</option>
                <?php
                $records = $getdata->my_sql_select($connect, null, "user", null);
                while ($data = mysqli_fetch_object($records)) {
                  echo "<option value='" . $data->ID . "'>" . $data->Fullname . "</option>";  // displaying data in option menu
                }
                ?>
              </select>
            </div>
          </div>
        </div>

      </div>
    </div>
    <section class="section has-background-light">
    <div class="field is-horizontal  has-aside-left">
      <div class="field-label">Status</div>
      <div class="field  is-narrow">
        <div class="control">
          <div class="field">
            <input id="switchRoundedSuccess" type="checkbox" name="switchRoundedSuccess" class="switch is-rounded is-success" checked="checked">
            <label for="switchRoundedSuccess">Switch rounded success</label>
          </div>
        </div>
      </div>
    </div>
    <div></div>
    </section>
    <div class="field is-horizontal">
      <div class="field-label"></div>
      <div class="field-body">
        <div class="field">
          <div class="field is-grouped">
            <div class="control">
              <button type="submit" class="button is-primary">
                <span>Assign</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</section>