<?php
include "../db_connect.php";
include "./scripts/time.php";

session_start();
if (!isset($_SESSION['employer_id'])) {
    header("Location:./login.php?requiredLogin='true'");
}
if (isset($_GET['signout'])) {
    setcookie('log_info', false);
    header("Location:./login.php");
}
$employer_id = $_SESSION['employer_id'];
$sql = "SELECT * FROM `project_info` where employer_id = $employer_id order by date desc";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($res);
?>
<?php include "base.php" ?>
<div class="big_container">

    <div class="card_container">
        <div class="wrapper">
            <div class="header cover">
                <label class="header_content">
                    <h4><?php echo "<pre>" . date('l F d') . "</pre>" ?></h4>

                    <h1 style="font-weight:400; font-family:'Neue Montreal';">Good day,</h1>
                    <h1 style="font-weight:300; font-family:'Neue Montreal';"><?php echo $_SESSION['employer_name'] ?></h1>
                </label>
                <div class="img_wrapper row">
                    <img class="image" src="./Images/stylized2.png">
                </div>
            </div>
            <div class="wrapper">
                <div class="header row center mb-1">
                    <h2>Your Jobs:</h2>
                </div>
                <div class="header">
                    <div class="card" id="card">

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
                                    <div class="heading card-items">
                                        <a class="black" href="./jobDetails.php?p_id=<?php echo $project_id ?>">
                                            <h3> <?php echo $name ?></h3>
                                        </a>
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
                        <?php }
                        } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-r row">
        <div>
            <div class="pp_container">
                <img class="pp" src="./Images/pp.jpg">
            </div><br>
            <div class="center">
                <h4 class=""><u> <?php echo $_SESSION['employer_name'] ?></u></h4>
            </div>
        </div>
    </div>
</div>
</div>

<?php include "footer.php" ?>
</body>

</html>