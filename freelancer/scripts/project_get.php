<?php

class projects_get
{
    function getQuery()
    {
        $range =  $_POST["range"];;
        $sql = "SELECT * FROM `project_info`";
        if (in_array("1000", $range)) {
            $sql .= "WHERE cost<=1000";
        }
        if (in_array("1000-5000", $range)) {
            $sql .= "WHERE cost> 1000 and cost<=5000 ";
        }
        if (in_array("5000-10000", $range)) {
            $sql .= "WHERE cost> 5000 and cost<=10000";
        }
        if (in_array("10000-50000", $range)) {
            $sql .= "WHERE cost>10000 and cost<=50000";
        }
        if (in_array("50000", $range)) {
            $sql .= "WHERE cost>=50000";
        }
        return $sql;
    }
    function projects()
    {
        require "../../db_connect.php";
        require "./time.php";
        $projects = new projects_get;
        $sql = $projects->getQuery();
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_all($res);
        if ($row) {
            $array = [];
            $data = [];
            foreach ($row as $info) {
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
                for ($i = 0; $i < count($skill); $i++) {
                    $data = [$project_id, $name, $description, $location, array_slice($skill, $i), $freelancer_id, $date, $expires_on, $cost];
                }
                // array_slice($skill, $i)
                array_push($array, array_slice($data, 0));
            }
            echo json_encode($array);
        }
    }
}
$projects = new projects_get;
$projects->projects();
