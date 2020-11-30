 <section class="section has-background-grey-light">
        <form action="dist/admin/save_student.php" method="post">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Student detail</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                        <input required class="input" type="text" name="student_id" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  placeholder="Student ID"/>                                                             </span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control is-expanded has-icons-left has-icons-right">
                            <input class="input" required type="text" name="student_name" placeholder="Full name">
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
                <div class="field-label"></div>
                <div class="field-body">
                    <div class="field is-expanded">
                        <div class="field has-addons">
                            <p class="control">
                            </p>
                            <p class="control is-expanded">
                                <input required class="input" name="email" type="email" placeholder="Your Email">
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Birthday</label>
                </div>
                <div class="field-body">
                    <div class="field is-narrow">
                        <div class="control">
                            <input required class="input" name="birthday" type="date">
                        </div>
                    </div>
                
                    <div class="field is-narrow">
                        <div class="control">
                            
                            <div class="select">
                                <select name="status">
                                    <option>exist</option>
                                    <option>expire</option>
                                  
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Address</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input required class="input" name="address" type="text">
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
                        <table id="student_data" class="table is-fullwidth is-scrollable  is-bordered is-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student ID</th>
                                    <th>group</th>
                                    <th>Full name</th>
                                    <th>Birthday</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Status</th>
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

        var dataTable = $('#student_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "dist/admin/fetch_student.php",
                type: "POST"
            }
        });

        $('#student_data').on('draw.dt', function() {
            $('#student_data').Tabledit({
                url: 'dist/admin/action_student.php',
                dataType: 'json',
                columns: {
                    identifier: [0, 'id'],
                    editable: [
                        [1, 'student_id'],
                        [2, 'student_name'],
                        [3, 'birthday'],
                        [4, 'address'],
                        [5, 'email'],
                        [6, 'status','{"exist":"exist","expire":"expire"}']
                    ]
                },
                restoreButton: false,
                onSuccess: function(data, textStatus, jqXHR) {
                    if (data.action == 'delete') {
                        $('#' + data.id).remove();
                        $('#student_data').DataTable().ajax.reload();
                    }
                }
            });
        });
</script>