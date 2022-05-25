<?php
session_start();

include("../../db_connect.php");

$employer_id = $_SESSION["employer_id"];
$project_id = $_GET['p_id'];
$freelancer_id = $_GET['f_id'];


$sql = "INSERT INTO selected_freelancers  VALUES('','$project_id','$freelancer_id','$employer_id')";
$res = mysqli_query($conn, $sql);
if ($res) {
    header("Location:../selected.php");
} else {
    $status = "Freelancer already selected.";
    header("Location:../selected.php?err=$status");
    echo "<br>Error";
}
