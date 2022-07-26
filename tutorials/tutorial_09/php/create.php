<?php

if (isset($_POST['create'])) {
    include "../db_conn.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = validate($_POST['name']);   
    $year = validate($_POST['year']);
    $age = validate($_POST['age']);
    $user_data = 'name=' . $name . '&year=' . $year . '&age=' . $age;
    if (empty($name)) {
        header("Location: ../create.php?error= User name is required&$user_data");
    } else if (empty($year)) {
        header("Location: ../create.php?error= Year is required&$user_data");
    } else if (empty($age)) {
        header("Location: ../create.php?error= Age is required&$user_data");
    } else {
        $sql = "INSERT INTO users(name, year, age) 
               VALUES('$name','$year','$age')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: ../index.php?success=successfully created");
        } else {
            header("Location: ../create.php?error=unknown error occurred&$user_data");
        }
    }
}
