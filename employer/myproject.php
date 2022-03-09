<?php
include "../db_connect.php";

date_default_timezone_set('Asia/Kathmandu');
session_start();
if (!isset($_SESSION['employer_id'])) {
    header("Location:./login.php?access=false");
} else {
    $employer_id = $_SESSION['employer_id'];
    $sql = "SELECT * FROM `project_info` where employer_id = $employer_id order by date desc";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($res);
}
if (isset($_GET['signout'])) {
    setcookie('log_info', false);
    header("Location:./login.php");
}
include "./scripts/time.php";
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
                if ($name == "" || $description == "" || $location == "" || $skills == "") {
                    continue;
                }
        ?>
                <div class="card-body">
                    <div class="icon_container">

                        <a class="icon" onClick="javascript: return confirm('Please confirm deletion:');
                        " href="./scripts/post_delete.php?id= 
                        <?php echo $project_id
                        ?>" id="del_button"><i class="fa-solid fa-trash-can"></i></a>
                    </div>
                    <div class="icon_container">
                        <a class="icon" href="./project_update.php"> <i class="fa-solid fa-pen-to-square"></i></a>
                    </div>
                    <div class="heading card-items">
                        <h3> <?php echo $name ?></h3>
                    </div>

                    <div class="card-items">
                        <div class="dim">
                            <em style="margin-right:1rem;">Budget: <?php echo "NRS " . number_format($cost) ?> </em>
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
                        <small style="margin-right:1rem"> Expires on:<?php echo $expires_on ?></small style="">
                        <small> <i class="fas fa-map-marker-alt"></i> <?php echo $location ?> </small>

                    </div>
                </div>
            <?php  } ?>
    </div>
</div>
<?php } else {
            echo "    <div class='card-body'>No Jobs To Show
            <a href='./post_add.php'> Click here to post your first job </a>
            </div>";
        } ?>
</body>
<script>
    // const del_button = document.getElementById("del_button");
    // del_button.addEventListener('click', whattodo());
    // function whattodo() {
    //     var con = confirm('Please confirm deletion');
    //     if (con) {
    //         console.log("ok")
    //     } else {
    //         console.log("cancel")
    //     }
    // }
</script>

</html>