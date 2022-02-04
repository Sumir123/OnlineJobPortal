<?php
$err_msg = $status = $err_cName = $err_cEmail =  $err_cPhone =  $err_cPassword = $err_confirmPassword = "";
if (isset($_POST['submit'])) {
    $comapnyName = $_POST["cName"];
    $comapnyEmail = $_POST["cEmail"];
    $comapnyPhone = $_POST["cPhone"];
    $comapnyPassword = $_POST["cPassword"];
    $confirmPassword = $_POST["confirmPassword"];
    if ($comapnyName == "") {
        $err_cName = true;
    }
    if ($comapnyEmail == "" || !filter_input(INPUT_POST, "cEmail", FILTER_VALIDATE_EMAIL)) {
        $err_cEmail = "Invalid Email format";
    }
    if ($comapnyPhone == "" || !preg_match("/^[0-9]/", $comapnyPhone) || !preg_match("/^98[0-9]{8}$/", $comapnyPhone)) {
        $err_cPhone = "Invalid phone number";
    }
    if ($comapnyPassword == "" || !preg_match("/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,32}/", $comapnyPassword)) {
        $err_cPassword = "Not Strong password";
    }
    if ($confirmPassword == "") {
        $err_confirmPassword = "Confirm password";
    }
    if ($comapnyPassword == $confirmPassword) { //put elseif for validation 
        header("Location: ./overview.php");
        exit();
    } else {
        $err_cPassword = "Password don't match";
        $err_confirmPassword = "Password don't match";
        $status = "Login Failed";
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
        <h2 style="margin-bottom:0.5em ;">Create your free Employer Account</h2>
        <p class="dim" style="margin-bottom:1em ;"> Fill the basic information and start recruiting now!</p>
        <div class="form-container ">
            <form method="POST">
                <div class="form-input">
                    <label for="cName">Company Name:</label>
                    <input <?php if ($err_cName) {
                                echo 'style="border: 1px solid red;"';
                            }
                            ?> type="text" name="cName" placeholder="Enter the name of your company" id="cName" autocomplete="off">
                    <span>

                    </span><br>
                </div>
                <div class="form-input">
                    <label for="cEmail">Official Email:</label>
                    <input <?php if ($err_cEmail) {
                                echo 'style="border: 1px solid red;"';
                            }
                            ?> type="text" name="cEmail" placeholder="Enter the official email of the company" id="cEmail" autocomplete="off">
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
                            ?> type="text" name="cPhone" placeholder="Enter the company contact number" id="cPhone" autocomplete="off">
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
                    <p class="dim"> Minimum eight characters, at least one upper and lowercase letters and one digit</p><br>

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