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

require("./db.php");
$count = 1;
$db = new Db;
$freelancer_info = $db->getFreelancersInfo();
$row = mysqli_fetch_all($freelancer_info, MYSQLI_ASSOC)
?>

<body>
    <div class="container">
        <nav class="nav_bar">
            <div class="title">
                <a href="./home.php" class="link">rojgar</a>
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
            <a href="#">
                <li class="active">Freelancers</li>
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
                // echo "<pre>";
                // print_r($row);
                // echo "</pre>";
                foreach ($row as $f_details) {
                    $name = $f_details['name'];
                    $email = $f_details['email'];
                    $phone = $f_details['phone'];
                    $f_id = $f_details['freelancer_id'];
                ?><tr>

                        <td><?php
                            echo $count;
                            $count++ ?> </td>
                        <td><?php echo $f_id; ?> </td>
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