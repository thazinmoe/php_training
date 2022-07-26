<?php
$sname = "localhost";
$uname = "root";
$password = "mysql123";
$db_name = "my_dbg";
$conn  = mysqli_connect($sname, $uname, $password, $db_name);
if (!$conn) {
    echo "Connection failed!";
}
