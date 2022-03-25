<?php
require("db.php");
include "./time.php";

$db = new Db;
if (!empty($_POST['range'])) {
    $range = $_POST['range'];

    if ($range) {
        $res = $db->getProjectsAccToCost($range);
        $row = mysqli_fetch_all($res);
        if ($row) {
            $count = 0;
            foreach ($row as $info) {
                $project_id = $info[0];
                $name = $info[1];
                $description = $info[2];
                $location = $info[3];
                $skills = $info[4];
                $skill[] = explode(",", $skills);
                $employer_id = $info[5];
                $date = $info[6];
                $expires_on = $info[7];
                $cost = $info[8];

                $date_sec = strtotime($date);
                $date = time_ago($date_sec);
                if ($name == "" || $description == "" || $location == "" || $skills == "") {
                    continue;
                }
?>
                <div class="card-body max-59">
                    <div class="heading card-items">
                        <h3> <?php echo $name ?></h3>
                    </div>

                    <div class="card-items">
                        <div class="dim">
                            <em style="margin-right:1rem;">Budget: <?php echo "NRS " . number_format($cost) ?> </em>
                            <small style="margin-right:1rem;">Posted: <?php echo $date ?> ago</small>

                        </div>
                    </div>
                    <div class="card-items">
                        <pre>  <?php echo $description ?> </pre>
                    </div>
                    <div class="card-items text" id="text">
                        <?php
                        foreach ($skill[$count] as $skillz) {
                            if (!$skillz == "") {
                                echo "<p class='small_text'>$skillz </p>";
                            }
                        }
                        $count++;
                        ?>
                    </div>
                    <div class="dim">
                        <small style="margin-right:1rem"> Expires on:<?php echo $expires_on ?></small style="">
                        <small> <i class="fas fa-map-marker-alt"></i> <?php echo $location ?> </small>

                    </div>
                </div>
            <?php  } ?>
            </div>
            </div>
            </div>
            <?php } else {
            echo "<p>No Jobs To Show</p>";
        }
    }
}
if (!empty($_POST['type'])) {
    $type = $_POST['type'];

    if ($type) {
        $res = $db->getProjectsAccToDate($type);
        $row = mysqli_fetch_all($res);
        if ($row) {
            $count = 0;
            foreach ($row as $info) {
                $project_id = $info[0];
                $name = $info[1];
                $description = $info[2];
                $location = $info[3];
                $skills = $info[4];
                $skill[] = explode(",", $skills);
                $employer_id = $info[5];
                $date = $info[6];
                $expires_on = $info[7];
                $cost = $info[8];

                $date_sec = strtotime($date);
                $date = time_ago($date_sec);
                if ($name == "" || $description == "" || $location == "" || $skills == "") {
                    continue;
                }
            ?>
                <div class="card-body max-59">
                    <div class="heading card-items">
                        <h3> <?php echo $name ?></h3>
                    </div>

                    <div class="card-items">
                        <div class="dim">
                            <em style="margin-right:1rem;">Budget: <?php echo "NRS " . number_format($cost) ?> </em>
                            <small style="margin-right:1rem;">Posted: <?php echo $date ?> ago</small>

                        </div>
                    </div>
                    <div class="card-items">
                        <pre>  <?php echo $description ?> </pre>
                    </div>
                    <div class="card-items text" id="text">
                        <?php
                        foreach ($skill[$count] as $skillz) {
                            if (!$skillz == "") {
                                echo "<p class='small_text'>$skillz </p>";
                            }
                        }
                        $count++;
                        ?>
                    </div>
                    <div class="dim">
                        <small style="margin-right:1rem"> Expires on:<?php echo $expires_on ?></small style="">
                        <small> <i class="fas fa-map-marker-alt"></i> <?php echo $location ?> </small>

                    </div>
                </div>
            <?php  } ?>
            </div>
            </div>
            </div>
<?php } else {
            echo "<p>No Jobs To Show</p>";
        }
    }
}
