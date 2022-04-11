<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <nav class="nav_bar">
            <div class="title">
                <a href="./home.php" class="link">rojgar</a>
            </div>
        </nav>
    </div>
    <div class="sidebar">
        <ul>
            <a href="#">
                <li class="active">Dashboard</li>
            </a>
            <a href="./employers.php">
                <li>Employers</li>
            </a>
            <a href="./freelancers.php">
                <li>Freelancers</li>
            </a>

            <a href="./projects.php">
                <li>Projects</li>
            </a>
        </ul>
    </div>
    <div class="body">
        <?php
        require("./db.php");
        $count = 1;
        $db = new Db;
        $no_employers = $db->countEmployers();
        $no_freelancers = $db->countFreelancers();
        $no_project = $db->countProjects();
        $no_proposal = $db->countProposal();
        ?>
        <h3>Dashboard</h3>
        <div class="row body_content">
            <div class="body_item bg1">
                <h4>Total Employers</h4>
                <h2>
                    <?php foreach ($no_employers as $total_employer) {
                        $employers =  $total_employer['total'];
                    }
                    echo $employers; ?></h2>
            </div>
            <div class="body_item bg2">
                <h4> Total Freelancers</h4>
                <h2>
                    <?php
                    foreach ($no_freelancers as $total_freelancer) {
                        $freelancers =  $total_freelancer['total'];
                    }
                    echo $freelancers; ?></h2>
            </div>
            <div class="body_item bg3">
                <h4> Total Projects</h4>
                <h2>
                    <?php foreach ($no_project as $total_projects) {
                        $projects =  $total_projects['total'];
                    }
                    echo $projects; ?></h2>
            </div>
            <div class="body_item bg4">
                <h4>Total Proposal</h4>
                <h2>
                    <?php foreach ($no_proposal as $total_proposal) {
                        $proposals =  $total_proposal['total'];
                    }
                    echo $proposals; ?></h2>
            </div>
        </div>
    </div>
</body>

</html>