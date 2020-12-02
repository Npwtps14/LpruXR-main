<?php 
session_start();
        if(isset($_POST['Username'])){
				//connection
                  include("../connect/connection.php");
				//รับค่า user & password
                  $Username = $_POST['Username'];
                  $Password = $_POST['Password'];
				//query 
                  $sql="SELECT * FROM user Where Username='".$Username."' and Password='".$Password."' ";

                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);
                      $_SESSION["user_id"] = $row["ID"];
                      $_SESSION["Username"] = $row["Username"];
                      $_SESSION["Userlevel"] = $row["Userlevel"];
                      $_SESSION["Fullname"] = $row["Fullname"];
                      

                      if($_SESSION["Userlevel"]=="Admin"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin.php

                        Header("Location: ../../"); //add_student.php

                      }

                      if ($_SESSION["Userlevel"]=="Teacher"){  //ถ้าเป็น member ให้กระโดดไปหน้า assignment.php

                        // Header("Location: ../../");
                      //  echo $_SESSION["Fullname"] = $row["Fullname"];
                      // echo $row = mysqli_fetch_array($result);
                      Header("Location: ../../test.php");
                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: index.php"); //user & password incorrect back to login again

        }
?>