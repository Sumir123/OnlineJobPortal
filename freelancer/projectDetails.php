<?php
require("./scripts/db.php");
require("./scripts/time.php");
$db  = new Db;


session_start();
if (!empty($_SESSION['freelancer_id'])) {
    if (!isset($_SESSION['freelancer_id'])) {
        header("Location:./login.php");
    }
}
if (!empty($_GET['p_id'])) {
    if (isset($_GET['p_id'])) {
        $p_id = $_GET['p_id'];
        $res = $db->getProjectsWhereId($p_id);
        $row = mysqli_fetch_all($res);
    }
} else {
    $err = "Unknown error occured";
}


if ($row) {
    $count = 0;
    foreach ($row as $info) {
        $project_id = $info[0];
        $name = $info[1];
        $description = $info[2];
        $location = $info[3];
        $skills = $info[4];
        $skill[] = explode(",", $skills);
        $employer_id = $info[5];
        $date = $info[6];
        $expires_on = $info[7];
        $cost = $info[8];

        $date_sec = strtotime($date);
        $date = time_ago($date_sec);
        include "./base.php";
?>

        <div class=" " id="">
            <div class="">
                <div class="back">
                    <div onclick="history.go(-1);" class="back-button"> <i class="fa-solid fa-angle-left"></i></div>
                </div>
                <div class="row content-2" id="">
                    <div class="content" id="content">
                        <div class="heading card-items">
                            <h2> <?php echo $name ?></h2>
                        </div>

                        <div class="card-items">
                            <div class="dim">
                                <em style="margin-right:1rem;">Budget: <?php echo "NRS " . number_format($cost) ?> </em>
                                <small style="margin-right:1rem;">Posted: <?php echo $date ?> ago</small>
                            </div>
                        </div>
                        <div class="card-items">
                            <pre><?php echo $description ?></pre>
                        </div>
                        <div class="card-items text m-1" id="text">
                            <h4>Skills and Expertise:</h4>
                            <?php
                            $count = 0;
                            foreach ($skill[$count] as $skillz) {
                                if (!$skillz == "") {
                                    echo "<p class='small_text'>$skillz </p>";
                                }
                            }
                            $count++;
                            ?>
                        </div>
                        <div class="dim">
                            <small style="margin-right:1rem"> Expires on:<?php echo $expires_on ?></small>
                            <small> <i class="fas fa-map-marker-alt"></i> <?php echo $location ?> </small>

                        </div>

                    </div>
                    <div class="sidebar">
                        <div class="mb--1">
                            <a href="./proposal.php?id=
                                    <?php

                                    $_SESSION['project_id'] = $project_id; ?>
                                    " class="submirButton">Submit a Proposal</a>

                        </div>
                        <hr>

                        <div>
                            About the client:
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
} ?>


<?php include "./footer.php" ?>