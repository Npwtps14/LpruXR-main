<?php session_start(); ?>
<?php

if (!$_SESSION["UserID"]) {

  Header("Location: index.php");
} else { ?>

  <!DOCTYPE html>
  <html lang="en" class="has-aside-left has-aside-mobile-transition  has-aside-expanded">

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
              <a href="teacher/?teacher_id=<?php echo $_SESSION["UserID"]; ?>" class="has-icon">
                <span class="icon has-update-mark"><i class="mdi mdi-table"></i></span>
                <span class="menu-item-label">จัดการรายวิชา</span>
              </a>
            </li>
            <li>
              <a href="create.php" class="has-icon">
                <span class="icon has-update-mark"><i class="mdi mdi-table"></i></span>
                <span class="menu-item-label">สร้างหัวข้องาน</span>
              </a>
            </li>
            <li>
              <a href="assignment.php" class="has-icon">
                <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                <span class="menu-item-label">มอบหมายงาน</span>
              </a>
            </li>

            <p class="menu-label">Management</p>
            <li>
              <a href="tracking.html" class="has-icon">
                <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                <span class="menu-item-label">สถานะการส่งงาน
                </span>
              </a>
            </li>
            <br> <br> <br> <br> <br>
            <li class="is-fixed-bottom">
              <a href="logout.php" class="has-icon">
                <center><button class="button is-danger is-rounded">Logout</button></center>
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
          <div class="card">
            <header class="card-header">
              <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-ballot-outline default"></i></span>
                มอบหมายงาน
              </p>
            </header>
            <form action="save_assignment.php" method="post">

              <div class="card-content">
                <br>
                <label class="label">Topic</label>
                <div class="select is-fullwidth">

                  <select name="txtSubject">
                    <option>Select topic</option>
                    <?php
                    include "connectDB.php";  // Using database connection file here
                    $records = mysqli_query($dbconnect, "SELECT topic From assignment");  // Use select query here 

                    while ($data = mysqli_fetch_array($records)) {
                      echo "<option value='" . $data['topic'] . "'>" . $data['topic'] . "</option>";  // displaying data in option menu
                    }
                    ?>
                  </select>
                </div>
                <br> <br>
                <label class="label">Student Name</label>
                <div class="select is-fullwidth">
                  <select name="txtSubject">
                    <option>Select name</option>
                    <?php
                    include "connectDB.php";  // Using database connection file here
                    $records = mysqli_query($dbconnect, "SELECT student_name From student");  // Use select query here 

                    while ($data = mysqli_fetch_array($records)) {
                      echo "<option value='" . $data['student_name'] . "'>" . $data['student_name'] . "</option>";  // displaying data in option menu
                    }
                    ?>
                  </select>
                </div>
                <br> <br>
                <label class="label">Date</label>
                <div class="field-body">
                  <div class="field">
                    <div class="control">
                      <input class="input is-danger" type="date">
                    </div>
                    <p class="help is-danger">
                      This field is required
                    </p>
                  </div>
                </div>
                <div class="field is-horizontal">
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
        <!-- FORM  -->
      </div>
    </section>
  </body>



  <script type="text/javascript" src="js/main.js"></script>
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

  </html>
<?php } ?>