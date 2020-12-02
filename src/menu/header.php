<section class="section is-title-bar has-background-success">
  <div class="level">
    <div class="level-left">
      <div class="level-item">
        <ul>
          <?php
          $headers = explode("/", $pageid->headers);
          foreach ($headers as $h) {
          ?>
            <li class="has-text-black"><?php echo $h; ?></li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <div class="level">
      <div class="level-right">
        <div class="level-item">
          <?php if (@$pageid->cases === "assignment") { ?>
            <!-- <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#assignModal">มอบหมายงาน</button> -->
          <?php } else if (@$pageid->cases === "assignmentStatus") { ?>
            <!-- <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#assignStatusModal">ค้นหางาน</button> -->
          <?php } ?>
          <?php
          $getdata->my_sql_query($connect, null, "user", "ID=" . $_SESSION['user_id'] . ".ID=" . $_SESSION['Username'] . " ");
          echo $_SESSION['Username'];
          ?>

        </div>
      </div>
    </div>
  </div>
</section>