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
        <div class="back">
            <div onclick="history.go(-1);" class="back-button"> <i class="fa-solid fa-angle-left"></i></div>
        </div>
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
            </div>

            <div class="wraper">
                <table class="fixed">
                    <thead>
                        <tr>
                            <th>Freelancer Name</th>
                            <th>Letter</th>
                            <th colspan="2">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $p_id = $_GET['p_id'];
                        $employer_id = $_SESSION['employer_id'];
                        $sql = "SELECT *   FROM `proposal` where project_id = $p_id order by date desc";
                        $res = mysqli_query($conn, $sql);
                        if ($res) {
                            $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
                            if ($row) {
                                foreach ($row as $detail) {
                                    $status = false;
                                    $cover = $detail['cover'];
                                    $freelancer_id = $detail['freelancer_id'];
                                    $sql = "SELECT * FROM `freelancer_info` where freelancer_id = $freelancer_id";
                                    $res = mysqli_query($conn, $sql);
                                    $f_details = mysqli_fetch_all($res, MYSQLI_ASSOC);
                                    foreach ($f_details as $data) {
                                        $name = $data['name'];
                                    }
                                    $sql = "SELECT project_id from selected_freelancers";
                                    $res = mysqli_query($conn, $sql);
                                    $p_id_row = mysqli_fetch_all($res, MYSQLI_ASSOC);
                                    foreach ($p_id_row as $p_id) {
                                        $p_id = $p_id["project_id"];
                                        if ($p_id == $project_id) {
                                            $status = true;
                                            break;
                                        }
                                    }

                        ?>
                                    <tr style="height:100px">
                                        <td> <a href="../freelancer/overview.php?freelancer_id=<?php echo "$freelancer_id" ?>"> <?php echo $name ?></a></td>
                                        <td height="1rem">
                                            <pre><?php echo $cover ?></pre>
                                        </td>
                                        <?php if (!$status) { ?>
                                            <td>
                                                <a onClick="javascript: 
                                                   return confirm('Select this freelancer?');
                                                    " href="./scripts/add_selected.php?p_id=<?php echo $project_id ?>&f_id=<?php echo $freelancer_id ?>">
                                                    Select</a>
                                            </td>
                                        <?php } else { ?>
                                            <td>
                                                <div style="color: red;"> Hired</div>
                                            </td>
                                        <?php } ?>
                                    </tr>
                        <?php
                                }
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>