<?php
if (isset($_COOKIE["log_info"])) {
    header("Location:./overview.php?employer_id=" . $_COOKIE['log_info']);
}
include("../db_connect.php");
$err_msg = $validation = $status = $err_cName = $err_cEmail =  $err_cPhone =  $err_cPassword = $err_confirmPassword = "";
if (isset($_POST['submit'])) {
    $comapnyName = $_POST["cName"];
    $comapnyEmail = $_POST["cEmail"];
    $comapnyPhone = $_POST["cPhone"];
    $comapnyPassword = $_POST["cPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    include("./validate.php");
    if ($validation == "confirm") {

        $has_pass = password_hash($comapnyPassword, PASSWORD_DEFAULT); //for log in if (password_verify('rasmuslerdorf', $hash)) 
        $sql = "INSERT INTO employer_info (`name`, `email`, `phone`, `password`) VALUES ('$comapnyName','$comapnyEmail','$comapnyPhone','$has_pass')";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            $status = mysqli_error($conn);
        } else {
            header("Location:./login.php");
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
                <li class="nav-items ">
                    <p class="link ">Log In <i class="fa-solid fa-down"></i></p>
                    <ul>
                        <li><a href="./login.php" class="link ">Employer</a></li>
                        <li><a href="" class="link "> Job seeker </a></li>
                </li>
            </ul>
        </div>
    </div>
    <div class="row container">
        <h2 style="margin-bottom:0.5em ;">Create your free Employer Account</h2>
        <p class="dim" style="margin-bottom:1em ;"> Fill the basic information and start recruiting now!</p>
        <div class="form-container ">
            <form method="POST">
                <div class="form-input">
                    <label for="cName">Employer Name(Display name):</label>
                    <input <?php if ($err_cName) {
                                echo 'style="border: 1px solid red;"';
                            }
                            ?> type="text" name="cName" placeholder="Enter the name of employer" id="cName" autocomplete="on">
                    <span>

                    </span><br>
                </div>
                <div class="form-input">
                    <label for="cEmail">Email:</label>
                    <input <?php if ($err_cEmail) {
                                echo 'style="border: 1px solid red;"';
                            }
                            ?> type="text" name="cEmail" placeholder="Enter the email" id="cEmail" autocomplete="on">
                    <span>
                        <?php if ($err_cEmail) {
                            echo "<span style='color:red;'> $err_cEmail </span>";
                        }
                        ?>
                    </span><br>

                </div>

                <div class="form-input">
                    <label for="cPhone"> Contact Number:</label>
                    <input <?php if ($err_cPhone) {
                                echo 'style="border: 1px solid red;"';
                            }
                            ?> type="text" name="cPhone" placeholder="Enter the contact number" id="cPhone" autocomplete="on">
                    <span>
                        <?php if ($err_cPhone) {
                            echo "<span style='color:red;'> $err_cPhone </span>";
                        }
                        ?>
                    </span><br>

                </div>

                <div class="form-input">
                    <label for="cPassword">Password:</label>
                    <input <?php if ($err_cPassword) {
                                echo 'style="border: 1px solid red;"';
                            }
                            ?> type="password" name="cPassword" placeholder="Enter your password" id="cPassword" autocomplete="off">
                    <span>
                        <?php
                        echo "<span style='color:red;'> $err_cPassword </span>";

                        ?>
                    </span>
                    <p class="dim"> Minimum six characters<br> at least one upper and lowercase letters <br> One digit</p>

                </div>

                <div class="form-input">

                    <label for="confirmPassword">Confirm Password:</label>
                    <input <?php if ($err_confirmPassword) {
                                echo 'style="border: 1px solid red;"';
                            }
                            ?> type="password" name="confirmPassword" placeholder="Confirm password" id="confirmPassword">
                    <span>
                        <?php
                        echo "<span style='color:red;'> $err_confirmPassword </span>";

                        ?>
                    </span><br>
                </div>

                <div class="form-input">
                    <?php echo "$status" ?>
                </div>

                <div class="form-input">
                    <button class="form-button" type="submit" name="submit"> Register </button>
                </div>
            </form>

        </div>