<?php
include "../../db_connect.php";
$id = $_GET["p_id"];
$sql = "DELETE from proposal where proposal_id=$id";
$res = mysqli_query($conn, $sql);
if (!$res) {
    $status = mysqli_error($conn);
} else {
    header("Location:../applied_jobs.php");
}
