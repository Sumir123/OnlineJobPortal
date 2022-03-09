<?php
session_start();

date_default_timezone_set('Asia/Kathmandu');
include("../../db_connect.php");


$employer_id = $_SESSION["employer_id"];
$projectName = htmlentities($_POST["pName"], ENT_QUOTES);
$projectDesc = htmlentities($_POST["pDesc"], ENT_QUOTES);
$projectLocation = htmlentities($_POST["pLocation"], ENT_QUOTES);
$projectSkills = htmlentities($_POST["skills"], ENT_QUOTES);
$cost = $_POST["cost"];
$currentdate = strtotime(date("Y/m/d h:i:s"));
$expires =  date('Y/m/d ', $currentdate + 604800);
if ($projectName == "" || $projectDesc == "" || $projectLocation == "" || $projectSkills == "") {
    $err_msg = "Enter all fields";
} else {
    $sql = "INSERT INTO project_info (`project_name`, `project_description`, `project_location`, `project_skills`,`employer_id`,`expires`,`cost`) VALUES ('$projectName','$projectDesc','$projectLocation','$projectSkills','$employer_id','$expires','$cost')";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        $status = mysqli_error($conn);
        echo "$status";
    } else {
        header("Location:../myproject.php");
    }
}
