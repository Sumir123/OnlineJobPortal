<?php

class get_project
{
    function projects()
    {
        require "../../db_connect.php";
        require "./time.php";
        $id = $_POST['id'];
        $sql = "SELECT * from project_info WHERE project_id=$id";
        $res = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($res);
        if ($row) {

            $project_id = $row['project_id'];
            $name = $row['project_name'];
            $description = $row['project_description'];
            $location = $row['project_location'];
            $skills = $row['project_skills'];
            $skill[] = explode(",", $skills);
            $freelancer_id = $row['employer_id'];
            $date = $row['date'];
            $expires_on = $row['expires'];
            $cost = $row['cost'];
            $date_sec = strtotime($date);
            $date = time_ago($date_sec);

?>

            <div class="content" id="content">
                <div class="heading card-items">
                    <h2> <?php echo $name ?></h2>
                </div>

                <div class="card-items">
                    <div class="dim">
                        <em style="margin-right:1rem;">Budget: <?php echo "NRS " . number_format($cost) ?> </em>
                        <small style="margin-right:1rem;">Posted: <?php echo $date ?> ago</small>
                    </div>
                </div>
                <div class="card-items">
                    <pre><?php echo $description ?></pre>
                </div>
                <div class="card-items text" id="text">
                    <?php
                    $count = 0;
                    foreach ($skill[$count] as $skillz) {
                        if (!$skillz == "") {
                            echo "<p class='small_text'>$skillz </p>";
                        }
                    }
                    $count++;
                    ?>
                </div>
                <div class="dim">
                    <small style="margin-right:1rem"> Expires on:<?php echo $expires_on ?></small>
                    <small> <i class="fas fa-map-marker-alt"></i> <?php echo $location ?> </small>

                </div>

            </div>
            <div class="sidebar">
                <a href="./proposal.php?id=
                <?php
                session_start();
                $_SESSION['project_id'] = $project_id; ?>
                " class="submirButton">Submit a Proposal</a>
            </div>
<?php
        }
    }
}
$projects = new get_project;
$projects->projects();
?>