<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<?php
if (!empty($_GET['err'])) {
    if (isset($_GET['err'])) {
        $err = "Incorrect, Try again ";
    }
}
?>

<body>
    <?php if (isset($err)) { ?>
        <div class="center" id="msg" style="padding: 1rem; background:white;">
            <h3 style="color: red; text-align:center">
                <?php
                echo $err;

                ?>
            </h3>
        </div>
    <?php } ?>
    <div class="row container-1 col" style="margin: 3rem;">
        <div class="form-container ">
            <h2 style="margin-bottom:0.5em ;">Admin Login</h2>
            <form method="POST" action="signin.php" id="loginform" class="form">

                <div class="form-input">
                    <label for="cEmail">Email:</label>
                    <input type="email" name="cEmail" placeholder="Enter email here.." id="email" autocomplete="off" require>
                    <span id="email_err">
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="cPassword">Password:</label>
                    <input type="password" name="cPassword" placeholder="Enter password here.." id="password" autocomplete="off" require>
                    <span id="password_err">
                    </span>
                </div>
                <div class="form-input">
                    <button class="form-button" type="submit" name="login" id="submitButton"> Login </button>
                </div>
            </form>

        </div>
</body>

</html>