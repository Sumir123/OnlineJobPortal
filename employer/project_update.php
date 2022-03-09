<?php
session_start();
if (!isset($_SESSION['employer_id'])) {
    header("Location:./login.php?access=false");
}
$employer_id = $_SESSION['employer_id'];

?>
<?php include "base.php" ?>

    <div class="row container">
        <h2 style="margin-bottom:0.5em ;">Basic project Information</h2>
        <div class="form-container ">
            <form method="POST" action="./scripts/post_add.php">
                <div class="form-input">
                    <label for="pName" class="label">Name for your project:</label>
                    <input type="text" name="pName" placeholder="Enter the project name" id="pName" autocomplete="off">
                    <span>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="pDesc">Project Description:</label><br>
                    <textarea name="pDesc" rows="4" cols="50" placeholder="Tell us more about your project" style="resize: none;" id="pDesc"></textarea>
                    <span>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="pLocation"> Project location:</label>
                    <input type="text" name="pLocation" placeholder="Enter the project location" id="pLocation" autocomplete="off">
                    <span>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="skills"> Skills:</label>
                    <input type="text" name="skills" placeholder="Enter the essential skills you are looking for" id="skills" autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="cost"> Cost(NRP):</label>
                    <input type="number" name="cost" placeholder="Enter the price you are willing to pay" id="cost" autocomplete="off">
                </div>
                <div class="form-input">
                    <button class="form-button" type="submit" name="post">UPDATE POST </button>
                </div>
            </form>

        </div>
    </div>