<?php
session_start();
if (!isset($_SESSION['employer_id'])) {
    header("Location:../employer/login.php?requiredLogin='true'");
}
if (isset($_GET['signout'])) {
    setcookie('log_info', false);
    header("Location:./login.php");
}
?>
<?php include "base.php" ?>
<script>
    $(document).ready(function() {
        $("#card").load("./scripts/projects.php");
    })
</script>
<div class="big_container">
    <div class="sidebar-l">
        <div>
            <h3>Filter by:</h3>
            <div class="cost">
                <form>
                    <h3> Cost</h3>
                    <div>
                        <input type="radio" name="cost" value="" id="less_1" /><label for="less_1"> Less than NRS 1,000</label>
                    </div>
                    <div>
                        <input type="radio" name="cost" value="" id="btwen1_5" /> <label for="btwen1_5">NRS 1,000 - NRS 5,000
                    </div>
                    <div>
                        <input type="radio" name="cost" value="" id="btwen5_10" /> <label for="btwen5_10">NRS 5,000 - NRS 10,000
                    </div>
                    <div>
                        <input type="radio" name="cost" value="" id="btwen10_50" /> <label for="btwen10_50">NRS 10,000 - NRS 50,000
                    </div>
                    <div>
                        <input type="radio" name="cost" value="" id="greater_50" /> <label for="greater_50">NRS 50,000+
                    </div>
                    <button id="go">Go</button>
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
                <label>Sort:</label>
                <select id="sort">
                    <option value="new"> Newest </option>
                    <option value="old"> Oldest </option>
                </select>
            </div>
        </div>
        <div class="card" id="card">
        </div>
    </div>
</div>
<?php include "./footer.php" ?>
</body>
<script>
    $('select').on('change', function() {
        type = this.value;
        $("#card").load("./scripts/search.php", {
            type: type
        });
    })
    var go_btn = document.querySelector("#go");
    go_btn.addEventListener('click', (e) => {
        e.preventDefault();
        var less_1 = document.querySelector("#less_1");
        var btwen1_5 = document.querySelector("#btwen1_5");
        var btwen5_10 = document.querySelector("#btwen5_10");
        var btwen10_50 = document.querySelector("#btwen10_50");
        var greater_50 = document.querySelector("#greater_50");
        range = [];
        if (less_1.checked) {
            range.push('1000');
        }
        if (btwen1_5.checked) {
            range.push('1000-5000');
        }
        if (btwen5_10.checked) {
            range.push('5000-10000');
        }
        if (btwen10_50.checked) {
            range.push('10000-50000');
        }
        if (greater_50.checked) {
            range.push('50000');
        }
        $("#card").load("./scripts/search.php", {
            range: range
        });
    })
</script>

</html>