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
              <a href="index.php" class="has-icon">
                <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                <span class="menu-item-label">ติดตามงาน</span>
              </a>
            </li>
          </ul>
  <?php if(@$users->Userlevel === "Admin"){ ?>
<p class="menu-label">Management</p>
            <ul class="menu-list">
                <li>
                    <a href="?page=add_student" class="is-active has-icon">
                        <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
                        <span class="menu-item-label">จัดการข้อมูลนักศึกษา
                        </span>
                    </a>
                </li>
                <li>
                    <a href="?page=add_teacher" class="is-active has-icon">
                        <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
                        <span class="menu-item-label">จัดการข้อมูลอาจารย์
                        </span>
                    </a>
                </li>
                <li>
                    <a href="?page=add_subject" class="is-active has-icon">
                        <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
                        <span class="menu-item-label">จัดการข้อมูลรายวิชา</span>
                    </a>
                </li>
                <li>
                    <a href="?page=add_register" class="is-active has-icon">
                        <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
                        <span class="menu-item-label">จัดการการลงทะเบียน
                        </span>
                    </a>
                </li>
          <?php } else if(@$users->Userlevel === "Teacher"){ ?>
          <p class="menu-label">Assignment</p>
          <ul class="menu-list">
            <li>
              <a href="?page=assignment" class="has-icon">
                <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                <span class="menu-item-label">มอบหมายงาน</span>
              </a>
            </li>

            <p class="menu-label">Management</p>
            <li>
              <a href="?page=assignmentStatus" class="has-icon">
                <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                <span class="menu-item-label">สถานะการส่งงาน
                </span>
              </a>
            </li>

          </ul>
          <?php } ?>

            <ul style="bottom: 30%;position:fixed;left:65px;">
              <li class="is-fixed-bottom">
              <?php if(isset($users->Userlevel)){?>
                <a href="dist/logout.php" class="has-icon">
                  <center><button class="button is-danger is-rounded">Logout</button></center>
                </a>
              <?php }else{ ?>
                <a href="dist/login/login.php" class="has-icon">
                  <center><button class="button is-success ">Login</button></center>
                </a>
              <?php } ?>
            </li>
            </ul>
        </div>
      </aside>
