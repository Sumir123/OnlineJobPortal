<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../jquery.js"> </script>
    <link rel="stylesheet" href="./freelancer/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,700;1,500&family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7e7af97cee.js" crossorigin="anonymous"></script>

    <title>Rojgar </title>
</head>

<body>
    <?php session_start(); ?>
    <div class="bucket">
        <nav class="nav_bar">
            <div class="title">
                <?php if (isset($_SESSION['employer_id'])) { ?>
                    <a href="./employer/home.php" class="link">rojgar</a>
                <?php } else if (isset($_SESSION['freelancer_id'])) { ?>
                    <a href="./freelancer/home.php" class="link">rojgar</a>
                <?php } else { ?>
                    <a href="./index.php" class="link">rojgar</a>
                <?php } ?>
            </div>
            <div class="">
                <form class="relative ">
                    <input class="search_input" type="text" placeholder="Search job titles">
                    <button class="icon_button"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <ul class="nav-list">

                <?php if (isset($_SESSION['employer_id'])) { ?>
                    <li class="nav-items "><a href="./employer/myproject.php" class="link ">My Jobs </a></li>
                    <li class="nav-items "><a href="./employer/post_add.php" class="link ">Add Jobs </a></li>
                <?php } elseif (isset($_SESSION['freelancer_id'])) { ?>
                    <li class="nav-items "><a href="./freelancer/allProjects.php" class="link ">Browse Jobs </a></li>
                    <li class="nav-items "><a href="./freelancer/applied_jobs.php" class="link ">Applied Jobs </a></li>
                <?php } ?>
                <?php if (!(isset($_SESSION['employer_id']) || isset($_SESSION['freelancer_id']))) { ?>
                    <li class="nav-items"> <a href="#" class="link ">Log In</a>
                        <ul>
                            <li><a href="./login.php" class="link ">Employer</a></li>
                            <li><a href="../freelancer/login.php" class="link "> Freeelancer </a></li>
                        </ul>
                    </li>
                    <li class="nav-items"> <a href="#" class="link ">Signup</a>
                        <ul>
                            <li><a href="./register.php" class="link ">Employer</a></li>
                            <li><a href="./freelancer/register.php" class="link "> Freeelancer </a></li>
                        </ul>
                    </li>
            </ul>
        <?php } else { ?>
            <li class="nav-items">
                <form action="./scripts/session.php"> <button onClick="javascript: 
                        return confirm('Are you sure you want to logout?');
                        " name="signout_button" class="a">Log Out</button></form>
                </ul>
            <?php } ?>
            <div class="nav_container">
                <div class="icon_container"> <i class="fa-solid fa-comment"></i></div>
            </div>

            <div class="nav_container">
                <div class="icon_container"> <i class="fa-solid fa-bell"></i></div>
            </div>
            <?php if (isset($_SESSION['employer_id'])) { ?>
                <div class="nav_container">
                    <a href="./employer/overview.php"> <img class="image_round" src="./employer/Images/pp.png"></a>
                </div>
            <?php } elseif (isset($_SESSION['freelancer_id'])) { ?>
                <div class="nav_container">
                    <a href="./freelancer/overview.php"> <img class="image_round" src="./freelancer/Images/pp.png"></a>
                </div>
            <?php } ?>
        </nav>
    </div>
    <div class="body" style=" margin: 1rem 10rem;">
        <div class="content" style="    padding: 2rem 10rem;
    overflow-wrap: anywhere;
    font-size: 1.3rem;">
            <h1 style="text-align:center ;"> What We Do</h1>
            <section> Rojgar offers services to the recruiting and job-seeking community in Nepal. We are the only recruitment service provider with 100% free service to all the jobseekers.
            </section>
            <section>It is our mission to bring the rapidly growing Nepalese Internet and computing talent to bear on international Web development.
            </section>
            <section>
                Jai Nepal!
            </section>
        </div>
    </div>