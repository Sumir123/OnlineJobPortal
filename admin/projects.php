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
$projects_info = $db->getProjects();
$row = mysqli_fetch_all($projects_info, MYSQLI_ASSOC);
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
            <a href="./employers.php">
                <li>Employers</li>
            </a>
            <a href="./freelancers.php">
                <li>Freelancers</li>
            </a>

            <a href="#">
                <li class="active">Projects</li>
            </a>
        </ul>
    </div>
    <div class="body">
        <h3>Projects</h3>
        <table class="table">
            <thead>
                <th> S.N </th>
                <th> Title </th>
                <th>Description</th>
                <th>Cost</th>
                <th>Location</th>
                <th>Skills</th>
                <th>Posted date</th>

            </thead>

            <tbody>
                <?php
                // echo "<pre>";
                // print_r($row);
                // echo "</pre>";
                foreach ($row as $project) {
                    $name = $project['project_name'];
                    $desc = $project['project_description'];
                    $location = $project['project_location'];
                    $skills = $project['project_skills'];
                    $date = $project['date'];
                    $cost = $project['cost'];
                ?><tr>
                        <td><?php
                            echo $count;
                            $count++ ?> </td>
                        <td><?php echo $name; ?> </td>
                        <td><?php echo $desc; ?></td>
                        <td><?php echo $cost; ?></td>
                        <td><?php echo $location; ?></td>
                        <td><?php echo $skills; ?></td>
                        <td><?php echo $date; ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>