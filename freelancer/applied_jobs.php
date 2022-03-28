<?php
session_start();
if (!isset($_SESSION['freelancer_id'])) {
    header("Location:../freelancer/login.php?requiredLogin='true'");
}
if (isset($_GET['signout'])) {
    setcookie('log_info', false);
    header("Location:./login.php");
}
require "../db_connect.php";
require "./scripts/time.php";
$id = $_SESSION['freelancer_id'];
$sql = "SELECT * from proposal where freelancer_id=$id ";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($res);

$p_id = $_SESSION['project_id'];
$p_sql = "SELECT * from project_info  where project_id=$p_id ";
$p_res = mysqli_query($conn, $p_sql);
$p_row = mysqli_fetch_all($p_res);
?>
<?php include "base.php" ?>

<div class="big_container">
    <div class="card_container">
        <div class="row container-4">
            <h3 style="text-align: center;width: -webkit-fill-available;">Applied Jobs:</h3>
        </div>

        <?php
        foreach ($row as $info) {
            foreach ($p_row as $p_info) {
        ?>
                <div class="card" id="card">
                    <div class="card-body max-73">
                        <div class="card-items">
                            <h3><?php echo "$p_info[1]" ?></h3>
                        </div>
                        <div class="card-items">
                            <p><i>Skills: <?php echo "$p_info[4]" ?></i></p>
                        </div>
                        <div class="card-items">
                            <pre><h4>Your Cover Letter:</h4><?php echo "$info[2]" ?></pre>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>

    </div>
</div>
<?php include "./footer.php" ?>
</body>


</html>