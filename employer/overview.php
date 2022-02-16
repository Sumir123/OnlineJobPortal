<?php
// $err_msg = $status = $err_cpName = $err_cpEmail =  $err_cpPhone = "";
// $contactName = $contactEmail  = $contactPhone  = '';
// if (isset($_POST['submit'])) {
//     $contactName = $_POST["cpName"];
//     $contactEmail = $_POST["cpEmail"];
//     $contactPhone = $_POST["cpPhone"];
//     if ($contactName == "") {
//         $status =    $err_cpName = "Enter Contact Persons Name ";
//     } elseif ($contactEmail == "" || !filter_input(INPUT_POST, "cpEmail", FILTER_VALIDATE_EMAIL)) {
//         $status =    $err_cpEmail = "Invalid Email format";
//     } elseif ($contactPhone == "" || !preg_match("/^[0-9]/", $contactPhone) || !preg_match("/^98[0-9]{8}$/", $contactPhone)) {
//         $status =   $err_cpPhone = "Invalid phone number";
//     } else {
//         $status = "Contact added Successfully";
//     }
// }
include "../db_connect.php";

if (!isset($_COOKIE["log_info"])) {
    header("Location:./login.php");
    // header("Location:./overview.php?employer_id=" . $_COOKIE['log_info']);
} else {
    $employer_id =  $_COOKIE['log_info'];
    $sql = "SELECT * FROM `employer_info` WHERE `employer_id`='$employer_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($res);
    $name = $row[0];
    $email = $row[1];
    $phone = $row[2];
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
                <li class="nav-items"><a class="link" href="">My Jobs </a></li>
                <li class="nav-items "><a class="link" href=""> Profile </a></li>
                <li class="nav-items "><a class="link" href="./post/add.php"> Post Jobs </a></li>
                <li class="nav-items ">
                    <form><button class="button-2" name="signout">Signout</button></form>
                </li>

            </ul>
        </div>
    </div>
    <div class="row info">
        <div class="container profile-picture">
            <div class="img">
                <img class="logo" src="./profile/picture/logo.png" alt="logo">
            </div>
            <div class="basic-info">
                <h4><?php echo $name ?></h4>
            </div>
            <hr>
            <div class="row details ">
                <div class="center mr-1 desc">
                    <i class="fas fa-map-marker-alt"></i><br>
                    <i class="fas fa-phone-alt"></i><br>
                    <i class="fas fa-envelope"></i><br>
                </div>
                <div class="center desc">
                    <br>
                    <p> <?php echo $phone ?></p<br>
                    <p><?php echo $email ?> </p>
                </div>
            </div>
        </div>

        <div class="container-2 fit half">
            <button class="add"><i class="fas fa-pen"></i></button><br>
            <div class="row" style=" align-items: center;">

                <div class="detail-topic">
                    <h5>Description</h5>
                </div>

                <div class="details">
                    <p></p>
                </div>

            </div>
            <div class="line"></div>
            <div class="row" style=" align-items: center;">
                <div class="detail-topic">
                    <h5>Details </h5>
                </div>
                <div class="details">

                </div>
            </div>
        </div>
    </div>

</body>

</html>