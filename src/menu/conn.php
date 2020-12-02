<?php
$dbconnect = mysqli_connect("localhost", "root", "", "lprux");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
