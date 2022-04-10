<?php

session_start();
if (!empty($_SESSION['employer_id'])) {
    if (!isset($_SESSION['employer_id'])) {
        header("Location:./login.php");
    }
}

$err = "";
if (isset($_GET["login"])) {
    $err = $_GET["login"];
}
if (isset($_GET["err"])) {
    $err = $_GET["err"];
}
if (isset($_GET["access"])) {
    $err = "You are not authorized";
}

if (isset($_GET["registered"])) {
    $err = "Successfully Registered";
}


if (isset($_GET["requiredLogin"])) {
    $err = "Login to browse jobs";
}

if (isset($_GET["logout"])) {
    if ($_GET["logout"] == "success") {
        $err = "Successfully Loged out";
    }
}
?>

<?php include "base.php" ?>
<?php if ($err) { ?>
    <div class="center" id="msg" style="padding: 1rem; background:white;">
        <h3>
            <?php
            echo $err;

            ?>
        </h3>
    </div>
<?php } ?>
<div class="row container-1 col" style="margin: 3rem;">
    <div class="side-image-2">
        <img class="image-2" src="./Images/leaves1.png">
    </div>

    <div class="form-container ">
        <h2 style="margin-bottom:0.5em ;">Log In As Employer</h2>
        <form method="POST" action="./scripts/login.php" id="loginform">

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
                Not yet a member? <a href="./register.php" class="">Create a new free employer account</a>
            </div>

            <div class="form-input">
                <button class="form-button" type="submit" name="login" id="submitButton"> Login </button>
            </div>
        </form>
    </div>
</div>
<?php include "./footer.php" ?>
<script>
    //to make msg disappear
    setTimeout(fadeout, 5000);

    function fadeout() {
        document.getElementById("msg").style.display = "none";
    }

    const submitButton = document.getElementById("submitButton");
    const email_err = document.getElementById("email_err");
    const password_err = document.getElementById("password_err");

    submitButton.addEventListener('click', function(e) {
        e.preventDefault();
        var email = document.getElementById("email");
        var password = document.getElementById("password");
        valid = validate(email, password);
        if (valid) {
            document.getElementById("loginform").submit();
        }
    })

    function validate(email, password) {
        valid = true;

        if (!email.value) {
            email_err.innerText = "Invalid Email";
            email.style.border = "1px solid red";

            valid = false;
        } else {
            email_err.innerText = "";
        };
        if (!password.value) {
            password_err.innerText = "Invalid Password";
            password.style.border = "1px solid red";

            valid = false;
        } else {
            password_err.innerText = "";
        };
        return valid;
    }
</script>