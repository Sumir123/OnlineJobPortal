<?php
session_start();
if (isset($_SESSION['freelancer_id'])) {
    header("Location:./home.php");
}
?>
<?php include "base.php" ?>

<div class="row container-3 col" style="margin: 3rem;">
    <div class="side-image" id="img">
        <img class="image-1" src="./Images/leaves-3923413_1920.jpg">
    </div>
    <div class="form-container">
        <div class="">
            <h2 style="margin-bottom:0.5em ;">Create your free freelancer Account</h2>
            <p class="dim" style="margin-bottom:1em ;"> Fill the basic information and start hiring now!</p>
        </div>
        <form method="POST" action="./scripts/signup.php?registered=true" id="signupform">
            <div class="form-input">
                <label for="Name">freelancer Name(Display name):</label>
                <input type="text" name="cName" placeholder="Enter the name of freelancer" id="Name" autocomplete="off">

            </div>
            <div class="form-input">
                <label for="Email">Email:</label><br>
                <input type="text" name="cEmail" placeholder="Enter the email" id="Email" autocomplete="off">

            </div>
            <div class="form-input">
                <label for="Phone"> Contact Number:</label>
                <input type="text" name="cPhone" placeholder="Enter the contact number" id="Phone" autocomplete="off">

            </div>
            <div class="form-input">
                <label for="Password">Password:</label><br>
                <input type="password" name="cPassword" placeholder="Enter your password" id="Password" autocomplete="off">

                <small style="color: grey;"> Minimum six characters<br>
                    One uppercase and lowercase letters <br>
                    One digit</small>
            </div>
            <div class="form-input">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" name="confirmPassword" placeholder="Confirm password" id="confirmPassword">
            </div>
            <div class="form-input">
                Already have a account <a href="./login.php">Log in </a>
            </div>
            <div class="form-input">
                <button class="form-button" type="submit" name="register" id="submitButton"> Register </button>
            </div>
        </form>
    </div>
</div>
<?php include "./footer.php" ?>
<script>
    const submitButton = document.getElementById("submitButton");

    submitButton.addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById("img").style.height = "671px";
        var name = document.getElementById("Name");
        var email = document.getElementById("Email");
        var phone = document.getElementById("Phone");
        var password = document.getElementById("Password");
        var confirmPassword = document.getElementById("confirmPassword");

        valid = validate(name, email, phone, password, confirmPassword);
        if (valid) {
            document.getElementById("signupform").submit();
        }
    })

    function validate(name, email, phone, password, confirmPassword) {
        valid = true;
        var regemail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var regphone1 = /^[0-9]/;
        var regphone2 = /^98[0-9]{8}$/;
        var regpassword = /(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,32}/;

        if (!name.value) {
            name.style.border = "1px solid red";
            valid = false;
        } else {
            name.style.border = "1px solid green";
        };
        if (!(email.value && regemail.test(email.value))) {
            email.style.border = "1px solid red";
            valid = false;
        } else {
            email.style.border = "1px solid green";
        };
        if (!(phone.value && regphone1.test(phone.value) && regphone2.test(phone.value))) {
            phone.style.border = "1px solid red";
            valid = false;
        } else {
            phone.style.border = "1px solid green";
        };
        if (password.value == "") {
            password.style.border = "1px solid red";
            valid = false;
        };
        if (!regpassword.test(password.value)) {
            password.style.border = "1px solid red";
            valid = false;
        } else if (!(password.value == confirmPassword.value)) {
            password.style.border = "1px solid red";
            confirmPassword.style.border = "1px solid red";
            valid = false;
        } else {
            password.style.border = "1px solid green";
            confirmPassword.style.border = "1px solid green";
        };
        return valid;
    }
</script>