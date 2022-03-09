<?php
include("../../db_connect.php");
$comapnyName = $_POST["cName"];
$comapnyEmail = $_POST["cEmail"];
$comapnyPhone = $_POST["cPhone"];
$comapnyPassword = $_POST["cPassword"];
$confirmPassword = $_POST["confirmPassword"];
$employer_id = rand(100, 100000);

include("./validate.php");
if ($validation == "confirm") {
    echo "validation complete";
    $has_pass = password_hash($comapnyPassword, PASSWORD_DEFAULT);
    $sql = "INSERT INTO employer_info (`employer_id` ,`name`, `email`, `phone`, `password`) VALUES ('$employer_id','$comapnyName','$comapnyEmail','$comapnyPhone','$has_pass')";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        $status = mysqli_error($conn);
        header("Location:../register.php?status=$status");
    } else {
        header("Location:../login.php");
    }
} else {
    header("Location:../register.php?status=$status");
}
