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
                <li class="nav-items "><a class="link" href=""> Profile </a></li>
            </ul>
        </div>
    </div>
    <div class="row container">
        <h2 style="margin-bottom:0.5em ;">Basic Job Information</h2>
        <div class="form-container ">
            <form method="POST">
                <div class="form-input">
                    <label for="cName">Job Post Title:</label>
                    <input type="text" name="cName" placeholder="Enter the Job position" id="cName" autocomplete="off">
                    <span>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="cEmail">Job post Description:</label>
                    <input type="number" name="cEmail" placeholder="Enter Job details" id="cEmail" autocomplete="off">
                    <span>
                    </span><br>
                </div>
                <div class="form-input">
                    <label for="cPhone"> Job location:</label>
                    <input type="text" name="cPhone" placeholder="Enter the company contact number" id="cPhone" autocomplete="off">
                    <span>
                    </span><br>
                </div>
                <div class="form-input">
                    <button class="form-button" type="submit" name="Post"> POST </button>
                </div>
            </form>

        </div>
    </div>