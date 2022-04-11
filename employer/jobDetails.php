<?php
include "../db_connect.php";
include "./scripts/time.php";

date_default_timezone_set('Asia/Kathmandu');
session_start();
if (!isset($_SESSION['employer_id'])) {
    header("Location:./login.php?access=false");
}
if (!empty($_SESSION['employer_id'])) {
    if (!isset($_SESSION['employer_id'])) {
        header("Location:./login.php");
    }
}
if (!empty($_GET['p_id'])) {
    if (isset($_GET['p_id'])) {
        $p_id = $_GET['p_id'];
        $employer_id = $_SESSION['employer_id'];
        $sql = "SELECT * FROM `project_info` where employer_id = $employer_id and project_id = $p_id order by date desc";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_all($res);
    }
}

?>
<?php include "base.php" ?>
<div class="card_container">
    <div class="card">
        <?php if ($row) {
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
        ?>
                <div class="card-body">
                    <div class="icon_container">

                        <a class="icon" onClick="javascript: return confirm('Please confirm deletion:');
                        " href="./scripts/post_delete.php?id= 
                        <?php echo $project_id
                        ?>" id="del_button"><i class="fa-solid fa-trash-can"></i></a>
                    </div>
                    <div class="icon_container">
                        <a class="icon" href="./project_update.php?id=<?php echo $project_id ?>"> <i class="fa-solid fa-pen-to-square"></i></a>
                    </div>
                    <div class="card-items">
                        <h3> <?php echo $name ?></h3>
                    </div>

                    <div class="card-items">
                        <div class="dim">
                            <em style="margin-right:1rem;">Budget: <?php echo "NRS " . number_format($cost) ?> </em><br>
                            <small style="margin-right:1rem;">Posted: <?php echo $date ?> ago</small>

                        </div>

                    </div>

                    <div class="card-items">
                        <?php echo $description ?>

                    </div>
                    <div class="card-items text">
                        <?php
                        foreach ($skill[$count] as $skillz) {
                            if (!$skillz == "") {
                                echo "<p class='small_text'>$skillz </p>";
                            }
                        }
                        $count++;
                        ?>
                    </div>
                    <div class="dim">
                        <small style="margin-right:1rem"> Expires on:<?php echo $expires_on ?></small style=""><br>
                        <small> <i class="fas fa-map-marker-alt"></i> <?php echo $location ?> </small>

                    </div>
                </div>
        <?php }
        } ?>
        <div class="card-body no_pointer">
            <div>
                <h3>Applied by:</h3>
                <?php
                $p_id = $_GET['p_id'];
                $employer_id = $_SESSION['employer_id'];
                $sql = "SELECT *   FROM `proposal` where project_id = $p_id order by date desc";

                $res = mysqli_query($conn, $sql);
                if ($res) {
                    $row = mysqli_fetch_all($res, MYSQLI_ASSOC);


                    if ($row) {
                        foreach ($row as $detail) {
                            $project_id = $detail['project_id'];
                            $proposal_id = $detail['proposal_id'];
                            $cover = $detail['cover'];
                            $freelancer_id = $detail['freelancer_id'];
                            $date = $detail['date'];
                            $date_sec = strtotime($date);
                            $date = time_ago($date_sec);

                            $sql = "SELECT * FROM `freelancer_info` where freelancer_id = $freelancer_id";
                            $res = mysqli_query($conn, $sql);
                            $f_details = mysqli_fetch_all($res, MYSQLI_ASSOC);
                            foreach ($f_details as $data) {
                                $name = $data['name'];
                            }
                ?>
                            <div class="wraper">
                                <div class="card-items">
                                    <h3> <?php echo $name ?></h3>
                                </div>


                                <div class="card-items">
                                    <pre><?php echo $cover ?></pre>
                                </div>

                                <div class="dim">
                                    <small style="margin-right:1rem"> Applied:<?php echo $date ?> ago</small style=""><br>
                                </div>
                            </div>
                    <?php
                        }
                    }
                } else { ?>
                    <div class="card-items " style="padding: 1rem;">
                        <h4> Noone has yet applied for this job</h4>
                    </div>
                <?php           }
                ?>
            </div>
        </div>
    </div>
</div>