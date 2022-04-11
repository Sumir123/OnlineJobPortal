<?php
include("../db_connect.php");

$email = $_POST["cEmail"];
$password = $_POST["cPassword"];


//for log in if (password_verify('rasmuslerdorf', $hash)) 
$sql = "SELECT `admin_id`,`email`, `password` FROM `admin_info` WHERE `email`='$email'";
$res = mysqli_query($conn, $sql);
echo "<pre>";
print_r($res);
if (mysqli_num_rows($res) == 1) {
    $row = mysqli_fetch_assoc($res);
    $admin_id = $row['admin_id'];
    $has_pass = $row['password'];
    if (password_verify($password, $has_pass)) {
        session_start();
        $_SESSION['admin_id'] = $row['admin_id'];
        header("Location:./dashboard.php");
    }
} else {
    header("Location:./login.php?err=true");
}
