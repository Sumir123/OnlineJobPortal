<?php
session_start();
if (!isset($_SESSION['freelancer_id'])) {
    header("Location:../login.php?requiredLogin='true'");
}
require "../db_connect.php";

$p_id = $_SESSION['project_id'];
$p_sql = "SELECT * from project_info  where project_id=$p_id ";
$p_res = mysqli_query($conn, $p_sql);
$p_row = mysqli_fetch_all($p_res);
include "base.php" ?>

<div class="row container-0 ">
    <?php
    foreach ($p_row as $p_info) { ?>
        <div class="form fm1">
            <h1 style="margin-bottom:0.5em ;">Submit a proposal</h1>
            <div class="card-items">
                <h3><?php echo "$p_info[1]" ?></h3>
            </div>
            <div class="card-items">
                <p><i>Skills: <?php echo "$p_info[4]" ?></i></p>
            </div>
            <div class="card-items mid">
                <p>
                <pre>Description: <?php echo "$p_info[2]" ?></pre>
                </p>
            </div>
            <div class="form-container ">
                <form method="POST" action="./scripts/add_proposal.php" id="Pform">
                    <div class="form-input">
                        <label for="cover">Cover Letter:</label><br>
                        <textarea name="cover" rows="4" cols="50" placeholder="" style="resize: none; height:10rem;" id="cover"></textarea>
                    </div>
                    <div class="form-input">
                        <button class="form-button" type="submit" name="post" id="post_button"> POST </button>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
</div>
<?php include "./footer.php" ?>