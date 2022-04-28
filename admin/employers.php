<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Dashboard</title>
</head>
<?php
session_start();
if (!empty($_SESSION['admin_id'])) {
    if (!isset($_SESSION['admin_id'])) {
        header("Location:../index.php");
    }
}
?>
<?php

require("./db.php");
$count = 1;
$db = new Db;
$employers_info = $db->getUserInfo();
$row = mysqli_fetch_all($employers_info, MYSQLI_ASSOC)
?>

<body>
    <div class="container">
        <nav class="nav_bar">
            <div class="title">
                <a href="./dashboard.php" class="link">rojgar</a>
            </div>
            <div class="card-items">
            <a href="./logout.php" onClick="javascript:return confirm('Are you sure you want to logout?');">
                    Logout</a>
            </div>
        </nav>
    </div>
    <div class="sidebar">
        <ul>
            <a href="./dashboard.php">
                <li>Dashboard</li>
            </a>
            <a href="#">
                <li class="active">Employers</li>
            </a>
            <a href="./freelancers.php">
                <li>Freelancers</li>
            </a>

            <a href="./projects.php">
                <li>Projects</li>
            </a>
        </ul>
    </div>
    <div class="body">

        <h3>Employers</h3>
        <table class="table">
            <thead>
                <th>S.N</th>
                <th>Id </th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </thead>

            <tbody>
                <?php
                foreach ($row as $e_details) {
                    $name = $e_details['name'];
                    $email = $e_details['email'];
                    $phone = $e_details['phone'];
                    $e_id = $e_details['employer_id'];
                ?><tr>
                        <td><?php
                            echo $count;
                            $count++ ?> </td>
                        <td><?php echo $e_id; ?> </td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $phone; ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>