<?php
include("../../db_connect.php");

$comapnyEmail = $_POST["cEmail"];
$comapnyPassword = $_POST["cPassword"];


//for log in if (password_verify('rasmuslerdorf', $hash)) 
$sql = "SELECT `employer_id`,`email`, `password`,`name` FROM `employer_info` WHERE `email`='$comapnyEmail'";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) == 1) {

    $row = mysqli_fetch_row($res);
    $employer_id = $row[0];
    $has_pass = $row[2];
    if (password_verify($comapnyPassword, $has_pass)) {
        session_start();
        $_SESSION['employer_id'] = $row[0];
        $_SESSION['employer_name'] = $row[3];

        header("Location:../home.php");
    } else {
        $status = "Incorrect Email or Password";
        header("Location:../login.php?err=$status");
    }
} else {
    $status = "Incorrect Email or Password";
    header("Location:../login.php?err=$status");
}
