<?php
$err_msg = $status = $err_cpName = $err_cpEmail =  $err_cpPhone = "";

if (isset($_POST['submit'])) {
    $contactName = $_POST["cpName"];
    $contactEmail = $_POST["cpEmail"];
    $contactPhone = $_POST["cpPhone"];


    if ($contactName == "") {
        $status =    $err_cpName = "Enter Contact Persons Name ";
    } elseif ($contactEmail == "" || !filter_input(INPUT_POST, "cpEmail", FILTER_VALIDATE_EMAIL)) {
        $status =    $err_cpEmail = "Invalid Email format";
    } elseif ($contactPhone == "" || !preg_match("/^[0-9]/", $contactPhone) || !preg_match("/^98[0-9]{8}$/", $contactPhone)) {
        $status =   $err_cpPhone = "Invalid phone number";
    } else {
        $status = "Login Success";
    }
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
            </ul>
        </div>
    </div>
    <div class="row info">
        <div class="container profile-picture">
            <div class="img">
                <img class="logo" src="./profile/picture/logo.png" alt="logo">
            </div>
            <div class="basic-info">
                <h4>Company Name</h4>
                <p class="dim">Industry</p>
            </div>
            <hr>
            <div class="row details">
                <div class="center mr-1">
                    <i class="fas fa-map-marker-alt"></i><br>
                    <i class="fas fa-phone-alt"></i><br>
                    <i class="fas fa-envelope"></i><br>
                </div>
                <div class="center">
                    Location<br>
                    Number<br>
                    Email
                </div>
            </div>
        </div>

        <div class="container-2 fit half">
            <div class="row" style=" align-items: center;">
                <div class="detail-topic">
                    <h5>Description</h5>
                </div>
                <div class="details">
                    <p>company overview what tey do and instructions</p>
                </div>
            </div>
            <div class="line"></div>
            <div class="row" style=" align-items: center;">
                <div class="detail-topic">
                    <h5> Contact Person </h5>
                </div>
                <div class="details">
                    <div>
                        <button class="add"><i class="fas fa-plus"></i></button><br>
                    </div>
                    <?php
                    echo $status;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="popup hidden" id="popup">
        <button id="close">&times;</button>
        <div class="popup-content">

            <form method="POST">
                <div class="form-input">
                    <label for="cpName">Contact Person Name:</label>
                    <input <?php if ($err_cpName) {
                                echo 'style="border: 1px solid red;"';
                            }
                            ?> type="text" placeholder="Contact Person Name" name="cpName" id="cpName">
                    <span>
                        <?php
                        echo $err_cpName;
                        ?>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="cpEmail">Contact Person Email:</label>
                    <input <?php if ($err_cpEmail) {
                                echo 'style="border: 1px solid red;"';
                            }
                            ?> type="text" placeholder="Contact Person Email" name="cpEmail" id="cpEmail">
                    <span>
                        <?php
                        echo "<span style='color:red;'> $err_cpEmail </span>";

                        ?>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="cpPhone">Contact Person Number:</label>
                    <input <?php if ($err_cpPhone) {
                                echo 'style="border: 1px solid red;"';
                            }
                            ?> type="text" placeholder="Contact Person Number" name="cpPhone" id="cpPhone">
                    <span>
                        <?php
                        echo "<span style='color:red;'> $err_cpPhone</span>";

                        ?>
                    </span><br>
                </div>
                <div class="form-input">

                    <button class="form-button" name="submit">Add</button>
                </div>

            </form>
        </div>
    </div>

    <script>
        var addButton = document.querySelector(".add");
        var closeButton = document.querySelector("#close");
        var popup = document.querySelector("#popup");
        var body = document.querySelector("#body");

        addButton.addEventListener("click", () => {
            popup.classList.remove("hidden");
            popup.classList.add("show");
        });
        closeButton.addEventListener('click', () => {
            popup.classList.remove("show");
            popup.classList.add("hidden");

        })
    </script>