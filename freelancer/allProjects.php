<?php
require("./scripts/db.php");
require("../db_connect.php");

require("./scripts/time.php");
$db  = new Db;
$res = $db->getProjects();
$row = mysqli_fetch_all($res);

if ($row) {

    $count = 0;
    foreach ($row as $info) {
        $selected = false;
        $project_id = $info[0];
        $name = $info[1];
        $description = $info[2];
        $location = $info[3];
        $skills = $info[4];
        $skill[] = explode(",", $skills);
        $freelancer_id = $info[5];
        $date = $info[6];
        $expires_on = $info[7];
        $cost = $info[8];

        $date_sec = strtotime($date);
        $date = time_ago($date_sec);
        if ($name == "" || $description == "" || $location == "" || $skills == "") {
            continue;
        }
        $sql = "SELECT project_id from selected_freelancers";
        $res = mysqli_query($conn, $sql);
        $p_id_row = mysqli_fetch_all($res, MYSQLI_ASSOC);
        foreach ($p_id_row as $p_id) {
            $p_id = $p_id["project_id"];
        }
        if ($p_id == $project_id) {
            $selected = true;
        }
?>
        <div data-modal-target="#modal" class="card-body max-73" data-value="<?php echo "$project_id" ?>">
            <div class="heading card-items">
                <a class="black" href="./projectDetails.php?p_id=<?php echo $project_id ?>">
                    <h3> <?php echo $name ?> <?php if ($selected) {
                                                    echo "<div style='color:red;'>Selected<div>";
                                                } ?></h3>
                </a>
            </div>
            <div class="card-items">
                <div class="dim">
                    <em style="margin-right:1rem;">Budget: <?php echo "NRS " . number_format($cost) ?> </em>
                    <br> <small style="margin-right:1rem;">Posted: <?php echo $date ?> ago</small>
                </div>
            </div>
            <div class="card-items">
                <pre><?php echo $description ?></pre>
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
<?php } else {
    echo "<p>No Jobs To Show</p>";
} ?>

<script>
    // const openModalbutton = document.querySelectorAll('[data-modal-target]')
    // const closeModalbutton = document.querySelectorAll('[data-close-button]')
    // const overlay = document.getElementById('overlay')
    // openModalbutton.forEach(button => {
    //     button.addEventListener('click', () => {
    //         id = (button.dataset.value)
    //         $("#contents").load("./scripts/get_project.php", {
    //             id: id
    //         });
    //     })
    // })
    // openModalbutton.forEach(button => {
    //     button.addEventListener('click', () => {
    //         const modal = document.querySelector(button.dataset.modalTarget)
    //         openModal(modal)
    //     })
    // })
    // closeModalbutton.forEach(button => {
    //     button.addEventListener('click', () => {
    //         const modal = button.closest('.modal')
    //         closeModal(modal)
    //     })
    // })
    // overlay.addEventListener('click', () => {
    //     const modals = document.querySelectorAll('.modal.active')
    //     modals.forEach(modal => {
    //         closeModal(modal)
    //     })
    // })

    // function openModal(modal) {
    //     if (modal == null) return
    //     modal.classList.add('active');
    //     overlay.classList.add('active')
    // }

    // function closeModal(modal) {
    //     if (modal == null) return
    //     modal.classList.remove('active');
    //     overlay.classList.remove('active')
    // }
</script>