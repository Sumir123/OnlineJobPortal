<?php
session_start();
include "../db_connect.php";

if (!empty($_GET['freelancer_id'])) {
    if (isset($_GET['freelancer_id'])) {
        $freelancer_id = $_GET["freelancer_id"];
    }
} else if (!empty($_GET['freelancer_id'])) {
    if (!isset($_SESSION['freelancer_id'])) {
        header("Location:../login.php?requiredLogin='true'");
    }
} else {
    $freelancer_id =  $_SESSION['freelancer_id'];
}

$location = false;

$sql = "SELECT * FROM `freelancer_info` WHERE `freelancer_id`='$freelancer_id'";
$res = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
foreach ($rows as $row) {
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
}
?>
<?php include "base.php" ?>
<div class="can">
    <div class="back">
        <div onclick="history.go(-1);" class="back-button"> <i class="fa-solid fa-angle-left"></i>&nbsp; Back</div>
    </div>
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
                <?php
                echo "City,Country";
                ?>
                <br>
                <i class="fa-solid fa-envelope"></i>
                <?php
                echo $email;
                ?>
                <br>
                <i class="fa-solid fa-phone"></i>
                <?php
                echo $phone;
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