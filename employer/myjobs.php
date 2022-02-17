<?php
include "../db_connect.php";
if (!isset($_COOKIE["log_info"])) {
    header("Location:./login.php");
    // header("Location:./overview.php?employer_id=" . $_COOKIE['log_info']);
} else {
    $employer_id = $_COOKIE['log_info'];
    $sql = "SELECT * FROM `project_info`";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($res);
}
if (isset($_GET['signout'])) {
    setcookie('log_info', false);
    header("Location:./login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Rojgar </title>

</head>

<body>
    <div class="nav-bar">
        <div class="title">
            <a href="../index.php" class="link">rojgar</a>
        </div>

        <div class="nav-bar-list">
            <ul class="nav-list">
                <li class="nav-items"><a class="link" href="">Find freelancer </a></li>
                <li class="nav-items "><a class="link" href="./overview.php"> Profile </a></li>
                <li class="nav-items "><a class="link" href="./post/add.php"> Post Jobs </a></li>
                <li class="nav-items ">
                    <form><button class="button-2" name="signout">Signout</button></form>
                </li>

            </ul>
        </div>
    </div>

    <div class="card">
        <?php foreach ($row as $info) {
            $name = $info[0];
            $description = $info[1];
            $location = $info[2];
            $skills = $info[3];
            $project_id = $info[4];
            $date = $info[5];
            $employer_id = $info[6];
            if ($name == "" || $description == "" || $location == "" || $skills == "") {
                continue;
            }
        ?>
            <div class="card-body">
                <div class="heading card-items">
                    <h3> <?php echo $name ?></h3>
                </div>
                <div class="card-items">
                    <div class="dim">
                        Posted on: <?php echo $date ?>
                        <i class="fas fa-map-marker-alt"></i><?php echo $location ?>
                    </div>

                </div>

                <div class="card-items">
                    <?php echo $description ?>

                </div>
                <div class="card-items">
                    <?php echo $skills ?>

                </div>
                <div class="dim"> Expires on: </div>
            </div>
        <?php  } ?>
    </div>


</body>

</html>