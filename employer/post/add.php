<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>Rojgar </title>
</head>

<body>
    <div class="nav-bar">
        <div class="title">
            <a href="../../index.php" class="link">rojgar</a>
        </div>

        <div class="nav-bar-list">
            <ul class="nav-list">
                <li class="nav-items"><a class="link" href="">Find freelancer </a></li>
                <li class="nav-items"><a class="link" href="">My Jobs </a></li>
                <li class="nav-items "><a class="link" href="../overview.php"> Profile </a></li>
            </ul>
        </div>
    </div>
    <div class="row container">
        <h2 style="margin-bottom:0.5em ;">Basic Job Information</h2>
        <div class="form-container ">
            <form method="POST">
                <div class="form-input">
                    <label for="cName" class="label">Choose a name for your project:</label>
                    <input type="text" name="cName" placeholder="Enter the Job position" id="cName" autocomplete="off">
                    <span>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="cEmail">Job post Description:</label><br>
                    <textarea name="jobDescription" rows="4" cols="50" placeholder="Tell us more about your job" style="resize: none;"></textarea>
                    <span>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="cPhone"> Job location:</label>
                    <input type="text" name="cPhone" placeholder="Enter the company contact number" id="cPhone" autocomplete="off">
                    <span>
                    </span><br>
                </div>
                <!-- <div class="form-input">
                    <input type="file">
                    <small> upload any images or documents that might be helpful <br>in explaining your brief here (Max file size: 25 MB).
                        <span> </small>
                    </span><br>
                </div> -->
                <div class="form-input">
                    <button class="form-button" type="submit" name="Post"> POST </button>
                </div>
            </form>

        </div>
    </div>