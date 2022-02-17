<?php
$employer_id = $_COOKIE["log_info"];
if (!isset($_COOKIE["log_info"])) {
    header("Location:./login.php");
}
include("../../db_connect.php");
$err_msg  = $status = "";
if (isset($_POST['post'])) {
    $projectName = $_POST["pName"];
    $projectDesc = $_POST["pDesc"];
    $projectLocation = $_POST["pLocation"];
    $projectSkills = $_POST["skills"];
    if ($projectName == "" || $projectDesc == "" || $projectLocation == "" || $projectSkills == "") {
        $err_msg = "Enter all fields";
    } else {
        $sql = "INSERT INTO project_info (`project_name`, `project_description`, `project_location`, `project_skills`,`employer_id`) VALUES ('$projectName','$projectDesc','$projectLocation','$projectSkills','$employer_id')";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            $status = mysqli_error($conn);
        } else {
            header("Location:../myjobs.php");
        }
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>Rojgar </title>
</head>

<body>
    <?php echo $status;  ?>
    <div class="nav-bar">
        <div class="title">
            <a href="../../index.php" class="link">rojgar</a>
        </div>

        <div class="nav-bar-list">
            <ul class="nav-list">
                <li class="nav-items"><a class="link" href="">Find freelancer </a></li>
                <li class="nav-items"><a class="link" href="../myjobs.php">My projects </a></li>
                <li class="nav-items "><a class="link" href="../overview.php"> Profile </a></li>
            </ul>
        </div>
    </div>
    <div class="row container">
        <h2 style="margin-bottom:0.5em ;">Basic project Information</h2>
        <div class="form-container ">
            <form method="POST">
                <div class="form-input">
                    <label for="pName" class="label">Name for your project:</label>
                    <input type="text" name="pName" placeholder="Enter the project name" id="pName" autocomplete="off">
                    <span>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="pDesc">Project Description:</label><br>
                    <textarea name="pDesc" rows="4" cols="50" placeholder="Tell us more about your project" style="resize: none;" id="pDesc"></textarea>
                    <span>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="pLocation"> Project location:</label>
                    <input type="text" name="pLocation" placeholder="Enter the project location" id="pLocation" autocomplete="off">
                    <span>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="skills"> Skills:</label>
                    <input type="text" name="skills" placeholder="Enter the essential skills you are looking for" id="skills" autocomplete="off">
                    <span>
                        <?php echo "$err_msg" ?>
                    </span><br>
                </div>
                <div class="form-input">
                    <button class="form-button" type="submit" name="post"> POST </button>
                </div>
            </form>

        </div>
    </div>