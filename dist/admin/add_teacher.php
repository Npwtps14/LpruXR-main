<section class="section has-background-grey-light">
    <form action="dist/admin/save_teacher.php" method="post">
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Account</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded has-icons-left">
                        <input required class="input" type="text" name="Username" placeholder="Username">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </p>
                </div>
                <div class="field">
                    <p class="control is-expanded has-icons-left has-icons-right">
                        <input required class="input" type="text" name="Password" placeholder="Password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">User Detail</label>
            </div>
            <div class="field-body">
                <div class="field is-narrow">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="Userlevel">
                                <option>Admin</option>
                                <option>Teacher</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field is-narrow">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="name_title">
                                <option>นาย</option>
                                <option>นางสาว</option>
                                <option>นาง</option>
                                <option>ดร.</option>
                                <option>อาจารย์</option>
                                <option>รศ.</option>
                                <option>ผศ.</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field is-narrow">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="branch">
                                <option >วิศวกรรมซอฟต์แวร์</option>
                                <!-- <?php
                                $records = $getdata->my_sql_select($connect, null, "user", null);
                                while ($data = mysqli_fetch_object($records)) {
                                    echo "<option value='" . $data->ID . "'>" . $data->branch . "</option>";  // displaying data in option menu
                                }
                                ?> -->
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field is-narrow">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="faculty">
                                <option > เทคโนโลยีอุตสาหกรรม</option>
                                <!-- <?php
                                $records = $getdata->my_sql_select($connect, null, "user", null);
                                while ($data = mysqli_fetch_object($records)) {
                                    echo "<option value='" . $data->ID . "'>" . $data->faculty . "</option>";
                                }
                                ?> -->
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label"></label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <input class="input" type="text" name="Fullname" placeholder="Full name">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input class="input" type="email" name="t_email" placeholder="Email">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input class="input" type="text" name="T_ID" placeholder="Teacher ID">
                    </div>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label">
                <!-- Left empty for spacing -->
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-primary">
                            Save
                        </button>
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
                    <table id="subj_data" class="table is-fullwidth is-scrollable  is-bordered is-striped   ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Title name</th>
                                <th>Fullname</th>
                                <th>Status</th>
                                <th>Email</th>
                                <th>Branch</th>
                                <th>faculty</th>
                                <th>Teacher ID</th>
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

    var dataTable = $('#subj_data').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "dist/admin/fetch_teacher.php",
            type: "POST"
        }
    });

    $('#subj_data').on('draw.dt', function() {
        $('#subj_data').Tabledit({
            url: 'dist/admin/action_teacher.php',
            dataType: 'json',
            columns: {
                identifier: [0, 'ID'],
                editable: [
                    [1, 'Username'],
                    [2, 'Password'],
                    [3, 'name_title'],
                    [4, 'Fullname'],
                    [5, 'Userlevel', '{"Admin":"Admin","Teacher":"Teacher"}'],
                    [6, 't_email'],
                    [7, 'branch'],
                    [8, 'faculty'],
                    [9, 'T_ID']
                ],

            },
            restoreButton: false,
            onSuccess: function(data, textStatus, jqXHR) {
                if (data.action == 'delete') {
                    $('#' + data.id).remove();
                    $('#subj_data').DataTable().ajax.reload();
                }
            }
        });
    });
</script>