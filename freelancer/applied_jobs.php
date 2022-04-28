<?php
session_start();
if (!isset($_SESSION['freelancer_id'])) {
    header("Location:../freelancer/login.php?requiredLogin='true'");
}
if (isset($_GET['signout'])) {
    setcookie('log_info', false);
    header("Location:./login.php");
}
require "../db_connect.php";
require "./scripts/time.php";
if ($_SESSION['freelancer_id']) {
    $id = $_SESSION['freelancer_id'];
}
?>
<?php include "base.php" ?>

<div class="big_container">
    <div class="card_container">
        <div class="row container-4">
            <h3 style="text-align: center;width: -webkit-fill-available;">Applied Jobs:</h3>
        </div>

        <table class="fixed">
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Cover Letter</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * from proposal where freelancer_id=$id";
                $res = mysqli_query($conn, $sql);
                $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);

                foreach ($rows as $row) {
                    $proposal_id = $row["proposal_id"];
                    $project_id = $row["project_id"];
                    $cover = $row["cover"];
                    $freelancer_id = $row["freelancer_id"];
                    $sql = "SELECT * from project_info where project_id=$project_id ";
                    $response = mysqli_query($conn, $sql);
                    $p_rows = mysqli_fetch_all($response, MYSQLI_ASSOC);
                    foreach ($p_rows as $p_row) {
                        $project_name = $p_row["project_name"];
                        $project_id = $p_row["project_id"];
                    }
                ?>
                    <tr style="height:100px">
                        <td><a href="./projectDetails.php?p_id=<?php echo "$project_id" ?>"><?php echo $project_name ?></a></td>
                        <td height="1rem">
                            <pre><?php echo $cover ?></pre>
                        </td>
                        <td>
                            <a onClick="javascript: 
                        return confirm('Are you sure you want to delete?');
                        " href="./scripts/delete_proposal.php?p_id=<?php echo $proposal_id ?>"> Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "./footer.php" ?>
</body>


</html>