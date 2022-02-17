
<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db = 'online_job_portal_info';
$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn) {
    die("connection failed" . mysqli_connect_error($conn));
}
