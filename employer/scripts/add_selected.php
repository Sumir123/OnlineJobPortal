<?php
session_start();

date_default_timezone_set('Asia/Kathmandu');
include("../../db_connect.php");

$employer_id = $_SESSION["employer_id"];
$project_id = $_GET['p_id'];
$freelancer_id = $_GET['f_id'];


$sql = "INSERT INTO selected_freelancers  VALUES('','$project_id','$freelancer_id','$employer_id')";

$res = mysqli_query($conn, $sql);
if (!$res) {
    $status = mysqli_error($conn);
    echo "$status";
} else {
    $sql = "DELETE from project_info where project_id=$project_id";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header("Location:../selected.php");
    } else {
        echo "Error";
    }
}
