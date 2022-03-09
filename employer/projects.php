<?php
date_default_timezone_set('Asia/Kathmandu');
session_start();
if (!isset($_SESSION['employer_id'])) {
    header("Location:../employer/login.php?requiredLogin='true'");
}
include "../db_connect.php";
$sql = "SELECT * FROM `project_info`  order by date desc";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($res);

if (isset($_GET['signout'])) {
    setcookie('log_info', false);
    header("Location:./login.php");
}
include "./scripts/time.php";
?>
<?php include "base.php" ?>


<div class="big_container">
    <div class="sidebar-l">
        <div>
            <h3>Filter by:</h3>
            <div class="cost">
                <form>
                    <h3> Cost</h3>
                    <div>
                        <input type="radio" name="cost" value="" id="1" /><label for="1"> Less than NRS 1,000</label>
                    </div>
                    <div>
                        <input type="radio" name="cost" value="" id="2" /> <label for="2">NRS 1,000 - NRS 5,000
                    </div>
                    <div>
                        <input type="radio" name="cost" value="" id="3" /> <label for="3">NRS 5,000 - NRS 10,000
                    </div>
                    <div>
                        <input type="radio" name="cost" value="" id="4" /> <label for="4">NRS 10,000 - NRS 50,000
                    </div>
                    <div>
                        <input type="radio" name="cost" value="" id="5" /> <label for="5">NRS 50,000+
                    </div>
                    <button>Go</button>


                </form>
            </div>


        </div>
    </div>
    <div class="card_container">
        <div class="row container-4">
            <form class="relative mr-25">
                <input class="white_search_bar" type="text" placeholder="Search job titles">
                <button class="search_icon"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div class="right">
                <h5>Sort:</h5>
                <ul>
                    <li><a href="">Newest &#160;&#160;&#160;&#160;&#160;&#160;&#160; <b>↓</b></a>
                        <ul>
                            <li><a href="">Oldest</a></li>
                            <li><a href="">Most popular</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <script>

        </script>
        <div class="card">
            <?php if ($row) {
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
                    <div class="card-body">
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
                            <?php echo $description ?>
                        </div>
                        <div class="card-items text">
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
            } ?>
<?php include "./footer.php" ?>
</body>
<script>
    var newest_btn = document.querySelector("#newest");
    var oldest_btn = document.querySelector("#oldest");
    var mostPopular_btn = document.querySelector("#mostPopular");
    newest_btn.addEventListener('click', () => {
        console.log("newest")
    })
    oldest_btn.addEventListener('click', () => {
        console.log("oldest")
    })
    mostPopular_btn.addEventListener('click', () => {
        console.log("mostPopular")
    })
</script>

</html>