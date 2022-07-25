<?php

include "db_conn.php";
$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
// echo "*********************";
// var_dump($result);
// echo "========================";
// var_dump(mysqli_num_rows($result));
// echo "------------------------------";
// if (mysqli_num_rows($result)) {
//     var_dump($rows = mysqli_fetch_assoc($result));
// }
