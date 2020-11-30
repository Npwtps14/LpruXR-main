<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-aside-expanded">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LpruX - Assignment - Create</title>
  <link rel="stylesheet" href="css/main.css">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
</head>

<body>
  <div id="app">
   
    <!-- Side menu -->
    <aside class="aside is-placed-left is-expanded">
      <div class="aside-tools">
        <div class="aside-tools-label">
          <span><b>Lpru</b>X</span>
        </div>
      </div>
      <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
          <li>
            <a href="index.html" class="has-icon">
              <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
              <span class="menu-item-label">ติดตามงาน</span>
            </a>
          </li>
        </ul>
        <p class="menu-label">Assignment</p>
        <ul class="menu-list">
          <li>
            <a href="create.php" class="has-icon">
              <span class="icon has-update-mark"><i class="mdi mdi-table"></i></span>
              <span class="menu-item-label">สร้างหัวข้องาน</span>
            </a>
          </li>
          <li>
            <a href="assignment.php" class="is-active has-icon">
              <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
              <span class="menu-item-label">มอบหมายงาน</span>
            </a>
          </li>
          <li>
            <a href="forms.html" class="is-active has-icon">
              <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
              <span class="menu-item-label">สถานะการส่งงาน
              </span>
            </a>
          </li>
          <p class="menu-label">Management</p>
          <li>
            <a href="https://admin-one-html.justboil.me/" target="_blank" class="has-icon">
              <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
              <span class="menu-item-label">การลงทะเบียน</span>
            </a>
          </li>
          <br> <br> <br> <br> <br>
          <li>
            <a href="https://justboil.me/bulma-admin-template/one" class="has-icon">
              <span class="icon"><i class="mdi mdi-help-circle"></i></span>
              <span class="menu-item-label">ออกจากระบบ</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>
    <!-- End side menu -->
    <section class="section is-title-bar">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <ul>
              <li>Assignment</li>
              <li>Create </li>
            </ul>
          </div>
        </div>
      </div>
  </div>
  </section>
  <section class="hero is-hero-bar">
    <div class="hero-body">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <h1 class="title">
              สร้างหัวข้องาน
            </h1>
          </div>
        </div>
        <div class="level-right" style="display: none;">
          <div class="level-item"></div>
        </div>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="card">
      <div class="card-content">
       <form id="create" action="save_create.php" method="post">
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Subject</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <div class="control">
                  <div  class="select is-fullwidth">
                    <select  name="txtSubject" >
                      <option >Select subject</option>
                      <?php
                      include "connectDB.php";  // Using database connection file here
                      $records = mysqli_query($dbconnect, "SELECT subject_name From subject");  // Use select query here 
                      while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['subject_name'] . "'>" . $data['subject_name'] . "</option>";  // displaying data in option menu
                      }
                      ?>
                      <p></p>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Topic</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control">
                  <input name="txtTopic" class="input is-danger" type="text" placeholder="หัวข้องาน">
                </div>
                <p class="help is-danger">
                  This field is required
                </p>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Description</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control">
                  <input class="textarea" type="text" name="txtDesc" placeholder="รายละเอียดงาน"></input>
                </div>
              </div>
            </div>
          </div>


          <hr>
          <div class="field is-horizontal">
            <div class="field-label">
              <!-- Left empty for spacing -->
            </div>
            <div class="field-body">
              <div class="field">
                <div class="field is-grouped">
                  <div class="control">
                    <button type="submit" class="button is-primary">
                      <span>Submit</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
    <?PHP
include "connectDB.php";// เรียกใช้งาน ConnectDB.php
$sql = mysqli_query($dbconnect,"SELECT * FROM assignment");
?>
<p align="center"><b>แสดงข้อมูลรายวิชาทั้งหมด</b>
<div class="card-content">
        <div class="table-container">
          <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
            <thead>
            <tr>

              </th>
              <th></th>
              <th>Subject name</th>
              <th>Topic</th>
              <th>Description</th>
              <th></th>
            </tr>
            </thead>
        </div>
      </div>
      <div class="table-container">
          <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
            <thead>
            <tr>

              </th>
              <?PHP
while($result = mysqli_fetch_array($sql))
{
    
  echo "<tr>";
  echo "<td  width=\"500\" >".$result['subj_name']."</td>";
  echo "<td  width=\"500\" >".$result['topic']."</td>";
  echo "<td  width=\"500\" >".$result['description']."</td>";
  echo "<td  width=\"60\"> <a href='createDel.php?ID=".$result['assignment_id']."'>ลบ</a></td>";
  echo "</tr>";
	}
	mysqli_close($dbconnect);
?>

</table>

    </div>
    </div>
  </section>

  <footer class="footer">
    <div class="container-fluid">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            © 2020, Tarn
          </div>
        </div>
        <div class="level-right">
          <div class="level-item">
            <div class="logo">
              <a href="https://justboil.me"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script type="text/javascript" src="js/main.js"></script>
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>

</html>