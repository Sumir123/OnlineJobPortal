<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./freelancer/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,700;1,500&family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7e7af97cee.js" crossorigin="anonymous"></script>

    <title>Rojgar </title>
</head>


<body>
    <div class="bucket">
        <nav class="nav_bar">

            <div class="title">
                <a href="#" class="link">rojgar</a>
            </div>
            <div class="">
                <form class="relative mr-20">
                    <input class="search_input" type="text" placeholder="Search job titles">
                    <button class="icon_button"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <ul class="nav-list">

                <li class="nav-items "><a href="./freelancer/projects.php" class="link ">Browse Jobs </a></li>

                <li class="nav-items"> <a href="#" class="link ">Log In</a>
                    <ul>
                        <li><a href="./employer/login.php" class="link ">Employer</a></li>
                        <li><a href="./freelancer/login.php" class="link "> Job seeker </a></li>
                    </ul>
                </li>
                <li class="nav-items"> <a href="#" class="link ">Signup</a>
                    <ul>
                        <li><a href="./employer/register.php" class="link ">Employer</a></li>
                        <li><a href="./freelancer/register.php" class="link "> Job seeker </a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <div class="">
        <div class="body row center">
            <div class="quote">
                <div>
                    <h4>Hire <i>freelancers</i> for any job,<br> online.</h4>

                </div>

                <div class="button-area">
                    <a class="button hire-button" href="./employer/register.php">Hire a Freelancer</a>
                    <a class="button work-button" href="./freelancer/register.php">Work as Freelancer</a>
                </div>
            </div>
            <div class="">
                <img class="" src="./freelancer/Images/work.png" height="500px">

            </div>
        </div>
        <?php include "footer.php" ?>
</body>

</html>