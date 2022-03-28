<?php
include("../../db_connect.php");
session_start();
$freelancer_id = $_SESSION["freelancer_id"];
$project_id = $_SESSION["project_id"];

$cover = htmlentities($_POST["cover"], ENT_QUOTES);

$sql = "INSERT INTO proposal (`project_id`,`cover`,`freelancer_id`) VALUES ('$project_id','$cover','$freelancer_id')";

$res = mysqli_query($conn, $sql);
if (!$res) {
    $status = mysqli_error($conn);
    echo "$status";
} else {
    header("Location:../applied_jobs.php");
}
