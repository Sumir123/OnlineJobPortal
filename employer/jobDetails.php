<?php
include "../db_connect.php";

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
?>
<?php include "base.php" ?>
<div class="card_container">
    <div class="card">
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
                <h3><a class="black" href="./jobDetails.php"> <?php echo $name ?></a></h3>
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

    </div>
</div>