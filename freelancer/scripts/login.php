<?php
include("../../db_connect.php");

$comapnyEmail = $_POST["cEmail"];
$comapnyPassword = $_POST["cPassword"];


//for log in if (password_verify('rasmuslerdorf', $hash)) 
$sql = "SELECT `freelancer_id`,`email`, `password`,`name` FROM `freelancer_info` WHERE `email`='$comapnyEmail'";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) == 1) {

    $row = mysqli_fetch_row($res);

    $freelancer_id = $row[0];
    $has_pass = $row[2];
    if (password_verify($comapnyPassword, $has_pass)) {
        session_start();
        $_SESSION['freelancer_id'] = $row[0];
        $_SESSION['freelancer_name'] = $row[3];

        header("Location:../home.php");
    } else {
        $status = mysqli_error($conn);
        header("Location:../login.php?err=$status");
    }
} else {
    $status = "Incorrect Email or Password";
    header("Location:../login.php?err=$status");
}
