    <section class="section has-background-grey-light ">
        <form action="dist/admin/save_subject.php" method="post">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Subject Detail</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input required class="input" type="text" name="subject_id" maxlength="7" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Subject ID">
                        </p>
                    </div>
                    <div class="field">
                        <p class="control is-expanded has-icons-left has-icons-right">
                            <input required class="input" type="text" name="subject_name" placeholder="Subject Name">
                        </p>
                    </div>
                    <div class="field">
                        <p class="control is-expanded has-icons-left has-icons-right">
                            <input required class="input" type="text" name="credit" placeholder="Credit">
                         
                        </p>
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
                                    <th>Subject ID</th>
                                    <th>Subject name</th>
                                    <th>Credit</th>
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
                url: "dist/admin/fetch_subject.php",
                type: "POST"
            }
        });

        $('#subj_data').on('draw.dt', function() {
            $('#subj_data').Tabledit({
                url: 'dist/admin/action_subject.php',
                dataType: 'json',
                columns: {
                    identifier: [0, 'id'],
                    editable: [
                        [1, 'subject_id'],
                        [2, 'subject_name'],
                        [3, 'credit']
                    ]
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