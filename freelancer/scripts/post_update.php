<?php
session_start();
include("../../db_connect.php");

$project_id = $_SESSION["project_id"];
$date = $_SESSION["date"];

$projectName = htmlentities($_POST["pName"], ENT_QUOTES);
$projectDesc = htmlentities($_POST["pDesc"], ENT_QUOTES);
$projectLocation = htmlentities($_POST["pLocation"], ENT_QUOTES);
$projectSkills = htmlentities($_POST["skills"], ENT_QUOTES);
$cost = $_POST["cost"];

if ($projectName == "" || $projectDesc == "" || $projectLocation == "" || $projectSkills == "") {
    $err_msg = "Enter all fields";
} else {
    $sql = "UPDATE project_info 
    SET project_name = '$projectName', 
    project_description='$projectDesc' ,
    project_location = '$projectLocation', 
    project_skills = '$projectSkills',
    cost ='$cost',
    date ='$date'
    WHERE project_id='$project_id';
    ";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        $status = mysqli_error($conn);
        echo "$sql";
        echo "$status";
    } else {
        if (isset($_SESSION['project_id'])) {
            unset($_SESSION['project_id']);
            unset($_SESSION['date']);
        }
        header("Location:../myproject.php");
    }
}
