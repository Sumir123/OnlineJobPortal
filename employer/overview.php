<?php
session_start();
include "../db_connect.php";

if (!isset($_SESSION['employer_id'])) {
    header("Location:./login.php?requiredLogin='true'");
} else {
    $location = false;
    $employer_id =  $_SESSION['employer_id'];
    $sql = "SELECT * FROM `employer_info` WHERE `employer_id`='$employer_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($res);
    $name = $row[1];
    $email = $row[2];
    $phone = $row[3];
    $phone = $row[3];
}
?>
<?php include "base.php" ?>
<div class="can">

    <div class="container-5">

        <div class="row center flex1">
            <img class="image_round big" src="./Images/pp.png">
        </div>
        <div class="flex4">
            <h2>
                <?php echo $name ?>
            </h2>
            <div>
                <i class="fas fa-map-marker-alt"></i>
                <?php if ($location) {
                    echo $location;
                }
                echo "City,Country";
                ?>
            </div>
        </div>
        <div id="pop-up-button">
            <button class="btn">Edit profile</button>
        </div>

    </div>
</div>
</div>
</body>

</html>