<?php

if (isset($_COOKIE["log_info"])) {
    header("Location:./overview.php");
    // header("Location:./overview.php?employer_id=" . $_COOKIE['log_info']);
}
include("../db_connect.php");
$err_msg = $status = $err_cEmail =  $err_cPassword = $validation  = "";
if (isset($_POST['login'])) {
    $comapnyEmail = $_POST["cEmail"];
    $comapnyPassword = $_POST["cPassword"];
    if ($comapnyEmail == "") {
        $err_cEmail = "Enter Email ";
    } elseif ($comapnyPassword == "") {
        $err_cPassword = "Enter a password";
    } else {
        $validation = "confirm";
    }
    if ($validation == "confirm") {

        //for log in if (password_verify('rasmuslerdorf', $hash)) 
        $sql = "SELECT `employer_id`,`email`, `password` FROM `employer_info` WHERE `email`='$comapnyEmail'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($res);
        $has_pass = $row[2];
        $employer_id = $row[0];
        if (password_verify($comapnyPassword, $has_pass)) {
            setcookie("log_info", $employer_id, time() + 2 * 24 * 60 * 60);
            header("Location:./overview.php");
        } else {
            echo "login failed  ";
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>Rojgar </title>
</head>


<body>
    <div class="nav-bar">
        <div class="title">
            <a href="../index.php" class="link">rojgar</a>
        </div>

        <div class="nav-bar-list">
            <ul class="nav-list">
                <li class="nav-items"><a href="">Explore </a></li>
                <li class="nav-items"><a href="">Browse Jobs </a></li>
                <li class="nav-items join-button"><a href="">Find work </a></li>
            </ul>
        </div>
    </div>
    <div class="row container">
        <h2 style="margin-bottom:0.5em ;">Log In As Employer</h2>
        <div class="form-container ">
            <form method="POST">
                <div class="form-input">
                    <label for="cEmail">Email:</label>
                    <input <?php if ($err_cEmail) {
                                echo 'style="border: 1px solid red;"';
                            }
                            ?> type="text" name="cEmail" placeholder="Enter email here.." id="cEmail" autocomplete="on">
                    <span>
                        <?php if ($err_cEmail) {
                            echo "<span style='color:red;'> $err_cEmail </span>";
                        }
                        ?>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="cPassword">Password:</label>
                    <input <?php if ($err_cPassword) {
                                echo 'style="border: 1px solid red;"';
                            }
                            ?> type="password" name="cPassword" placeholder="Enter password here.." id="cPassword" autocomplete="off">
                    <span>
                        <?php
                        echo "<span style='color:red;'> $err_cPassword </span>";
                        ?>
                    </span>
                </div>

                <div class="form-input">
                    <?php echo "$status" ?>
                </div>

                <div class="form-input">
                    <button class="form-button" type="submit" name="login"> Login </button>
                </div>
            </form>

        </div>