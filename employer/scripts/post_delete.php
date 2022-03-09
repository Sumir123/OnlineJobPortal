<?php
include "../../db_connect.php";
$id = $_GET["id"];
$sql = "Delete from project_info where project_id=$id";
$res = mysqli_query($conn, $sql);
if (!$res) {
    $status = mysqli_error($conn);
} else {
    header("Location:../myproject.php");
}
