<?php
session_start();
if (!isset($_SESSION['employer_id'])) {
    header("Location:./login.php?access=false");
}
?>
<?php include "base.php" ?>

<div class="row container-0 ">
    <div class="side-image-3">
        <img class="image-3" src="./Images/artwork.png">
    </div>
    <div class="form fm1">
        <h2 style="margin-bottom:0.5em ;">Basic project Information</h2>
        <div class="form-container ">
            <form method="POST" action="./scripts/post_add.php" id="Pform">
                <div class="form-input">
                    <label for="pName" class="label">Name for your project:</label>
                    <input type="text" name="pName" placeholder="Enter the project name" id="pName" autocomplete="off">
                    <br> <span id="pName_err">
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="pDesc">Project Description:</label><br>
                    <textarea name="pDesc" rows="4" cols="50" placeholder="Tell us more about your project" style="resize: none;" id="pDesc"></textarea>
                    <br> <span id="pDesc_err">
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="pLocation"> Project location:</label>
                    <input type="text" name="pLocation" placeholder="Enter the project location" id="pLocation" autocomplete="off">
                    <br> <span id="pLocation_err">
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="skills"> Skills:</label>
                    <small> use comma(,) to seperate different skills</small>
                    <input type="text" name="skills" placeholder="Enter the essential skills you are looking for" id="skills" autocomplete="off">
                    <br> <span id="skills_err">
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="cost"> Budget(NRP):</label>
                    <input type="number" name="cost" placeholder="Enter the price you are willing to pay" id="cost" autocomplete="off">
                    <br> <span id="cost_err">
                    </span><br>
                </div>
                <div class="form-input">
                    <button class="form-button" type="submit" name="post" id="post_button"> POST </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "./footer.php" ?>
<script>
    var post_button = document.getElementById("post_button");
    post_button.addEventListener('click', function(e) {
        e.preventDefault();
        $correct = validate();
        if ($correct) {
            document.getElementById("Pform").submit();
        }
    });

    function validate() {

        var valid = true;
        var pName = document.querySelector("#pName");
        var pDesc = document.querySelector("#pDesc");
        var pLocation = document.querySelector("#pLocation");
        var skills = document.querySelector("#skills");
        var cost = document.querySelector("#cost");

        var pName_err = document.querySelector("#pName_err");
        var pDesc_err = document.querySelector("#pDesc_err");
        var pLocation_err = document.querySelector("#pLocation_err");
        var skills_err = document.querySelector("#skills_err");
        var cost_err = document.querySelector("#cost_err");

        if (!pName.value) {
            pName_err.innerText = "Invalid project name";
            pName.style.border = "1px solid red";
            valid = false;
        }
        if (!pDesc.value) {
            pDesc_err.innerText = "Invalid project description";
            pDesc.style.border = "1px solid red";
            valid = false;
        }
        if (!pLocation.value) {
            pLocation_err.innerText = "Invalid  location";
            pLocation.style.border = "1px solid red";
            valid = false;
        }
        if (!skills.value) {
            skills_err.innerText = "Invalid  skills";
            skills.style.border = "1px solid red";
            valid = false;
        }
        if (!cost.value) {
            cost_err.innerText = "Invalid  cost";
            cost.style.border = "1px solid red";
            valid = false;
        }
        return valid;
    }
</script>