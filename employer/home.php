<?php
include "../db_connect.php";
session_start();
if (!isset($_SESSION['employer_id'])) {
    header("Location:./login.php?requiredLogin='true'");
}
if (isset($_GET['signout'])) {
    setcookie('log_info', false);
    header("Location:./login.php");
}

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