<?php
session_start();
if (!isset($_SESSION['employer_id'])) {
    header("Location:./login.php?access=false");
}
include "../db_connect.php";
$id = $_GET["id"];
$sql = "SELECT * from project_info where project_id =$id ";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($res);
?>
<?php include "base.php" ?>
<div class="row container">
    <h2 style="margin-bottom:0.5em ;">Basic project Information</h2>
    <div class="form-container ">
        <?php if ($row) {
            $count = 0;
            foreach ($row as $info) {
                $project_id = $info[0];
                $name = $info[1];
                $description = $info[2];
                $location = $info[3];
                $skills = $info[4];
                $cost = $info[8];
                $date = $info[6];
                $_SESSION['project_id']  = $project_id;
                $_SESSION['date']  = $date;
            }
        ?>
            <form method="POST" action="./scripts/post_update.php">
                <div class="form-input">
                    <label for="pName" class="label">Name for your project:</label>
                    <input value="<?php echo $name ?>" type="text" name="pName" placeholder="Enter the project name" id="pName" autocomplete="off">
                    <span>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="pDesc">Project Description:</label><br>
                    <textarea value="" name="pDesc" rows="4" cols="50" placeholder="Tell us more about your project" style="resize: none;" id="pDesc"><?php echo $description ?>
                </textarea>
                    <span>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="pLocation"> Project location:</label>
                    <input value="<?php echo $location ?>" type="text" name="pLocation" placeholder="Enter the project location" id="pLocation" autocomplete="off">
                    <span>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="skills"> Skills:</label>
                    <input value="<?php echo $skills ?>" type="text" name="skills" placeholder="Enter the essential skills you are looking for" id="skills" autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="cost"> Cost(NRP):</label>
                    <input value="<?php echo $cost ?>" type="number" name="cost" placeholder="Enter the price you are willing to pay" id="cost" autocomplete="off">
                </div>
                <div class="form-input">
                    <button class="form-button" type="submit" name="post">UPDATE POST </button>
                </div>
            </form>
        <?php } ?>
    </div>
</div>