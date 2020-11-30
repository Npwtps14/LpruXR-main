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
        <?php include('./slide_menu.php');?>
      <!-- End side menu -->

      <section class="section is-title-bar">
        <?php include('./tab.php');?>
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
    </div>
  </body>
  <script type="text/javascript" src="js/main.js"></script>
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
  </html>
<?php } ?>
