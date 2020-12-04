<section class="section  has-background-grey-light ">
  <form id="register" action="dist/admin/save_register.php" method="post">
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Register details</label>
      </div>
      <div class="field-body">
        <div class="field is-narrow">
          <div class="control">
            <input required class="input" require type="text" name="term" placeholder="Term">
          </div>
        </div>
        <div class="field is-narrow">
          <div class="control">
            <div class="select is-fullwidth">
              <select name="s_group">
                <option value="">Group</option>
                <?php
                 $student = $getdata->my_sql_select($connect, null, "student", "1 GROUP BY s_group");

                 while ($datastudent = mysqli_fetch_array($student)) {
                   echo "<option value='" . $datastudent['s_group'] . "'>" . $datastudent['s_group'] . "</option>";  // displaying data in option menu
                 }
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
                <option value="" selected>Subject</option>
                <?php
                $records = $getdata->my_sql_select($connect, null, "subject", null);
                while ($data = mysqli_fetch_object($records)) {
                  echo "<option value='" . $data->subject_id . "'>" . $data->subject_id . " :" . $data->subject_name . "</option>";  // displaying data in option menu
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
    <div class="field is-horizontal">
      <div class="field-label">
      </div>
      <div class="field-body">
        <div class="field">
          <div class="field is-grouped">
            <div class="control">
              <button type="submit" class="button is-primary">
                <span>SAVE</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  </section>
<section>
  <div class="column  table-wrapper-scroll-y my-custom-scrollbar ">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table id="register_data" class="table is-fullwidth is-scrollable  is-bordered is-striped   ">
            <thead>
              <tr>
                <th>ID</th>
                <th>Term</th>
                <th>Group</th>
                <th>Subject ID</th>
                <th>Subject name</th>
                <th>Teacher name</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</section>

<script type="text/javascript" language="javascript">
  var map = {};

  var dataTable = $('#register_data').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
      url: "dist/admin/fetch_register.php",
      type: "POST",
      complete: function() {
        $(".iddata").hide();
      },
    },
    "columns": [{
        className: "iddata"
      },
      null,
      null,
      null,
      null,
      null
    ]
  });

  

  $('#register_data').on('draw.dt', function() {
    $('#register_data').Tabledit({
      url: 'dist/admin/action_register.php',
      dataType: 'json',
      columns: {
        identifier: [0, 'r_id'],
        editable: [
          [1, 'r_id'],
          [2, 's_group'],
          [3, 'term'],
          [4, 'subject_id'],
          [5, 'subject_name'],
          [6, 'Fullname'],

        ]

      }
      ,
      restoreButton: false,
      onSuccess: function(data, textStatus, jqXHR) {
        if (data.action == 'delete') {
          $('#' + data.id).remove();
          $('#register_data').DataTable().ajax.reload();
        }
      }
    });
  });
</script>