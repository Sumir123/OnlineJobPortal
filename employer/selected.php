<?php
include "../db_connect.php";

session_start();

if (!empty($_SESSION['employer_id'])) {
    if (!isset($_SESSION['employer_id'])) {
        header("Location:./login.php");
    }
}
$err = "";
if (!empty($_GET['err'])) {
    if (!isset($_GET['err'])) {
        $err = $_GET["err"];
    }
}
$employer_id = $_SESSION['employer_id'];

?>
<?php include "base.php" ?>
<div class="card_container">
    <div class="card">
        <div class="back">
            <div onclick="history.go(-1);" class="back-button"> <i class="fa-solid fa-angle-left"></i></div>
        </div>
        <?php if ($err) { ?>
            <div style="color:red;"><?php echo "$err";
                                }  ?></div>
            <table class="fixed">
                <thead>
                    <tr>
                        <th>Selected Freelancer Name</th>
                        <th>Project Name</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `selected_freelancers` where employer_id = $employer_id ";
                    $res = mysqli_query($conn, $sql);
                    $selected_row = mysqli_fetch_all($res, MYSQLI_ASSOC);


                    foreach ($selected_row as $rows) {
                        $project_id = $rows["project_id"];
                        $freelancer_id = $rows["freelancer_id"];
                        $sql = "SELECT project_id,project_name from project_info  where project_id=$project_id";
                        $sql2 = "SELECT freelancer_id,name from freelancer_info where freelancer_id =$freelancer_id ";

                        $res1 = mysqli_query($conn, $sql);
                        $res2 = mysqli_query($conn, $sql2);

                        $row1 = mysqli_fetch_all($res1, MYSQLI_ASSOC);
                        $row2 = mysqli_fetch_all($res2, MYSQLI_ASSOC);
                        foreach ($row1 as $roww1) {
                            $project_id = $roww1["project_id"];
                            $project_name = $roww1["project_name"];
                        }
                        foreach ($row2 as $roww2) {
                            $freeelancer_id = $roww2["freelancer_id"];
                            $freelancer_name = $roww2["name"];
                        }
                    ?>
                        <tr style="height:100px">
                            <td>
                                <a href="../freelancer/overview.php?freelancer_id=<?php echo "$freelancer_id" ?>"> <?php echo $freelancer_name ?></a>
                            </td>
                            <td><a href="./projectDetails.php?p_id=<?php echo "$project_id" ?>"><?php echo $project_name ?></a></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>
</div>
<?php include "footer.php" ?>