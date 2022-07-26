<?php

if (isset($_GET['id'])) {
    include "db_conn.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $id = validate($_GET['id']);
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: index.php");
    }
} else if (isset($_POST['update'])) {
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
    $id = validate($_POST['id']);
    if (empty($name)) {
        header("Location: ../update.php?id=$id&error=User name is required");
    } else if (empty($year)) {
        header("Location: ../update.php?id=$id&error=Year is required");
    } else if (empty($age)) {
        header("Location: ../update.php?id=$id&error=Age is required");
    } else {
        $sql = "UPDATE users
               SET name='$name', year='$year', age='$age'
               WHERE id=$id ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: ../index.php?success=successfully updated");
        } else {
            header("Location: ../update.php?id=$id&error=unknown error occurred&$user_data");
        }
    }
} else {
    header("Location: index.php");
}
