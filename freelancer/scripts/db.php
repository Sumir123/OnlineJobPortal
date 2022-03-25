<?php
class Db
{
    var $conn;
    function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "") or die(mysqli_error($this->conn));
        mysqli_select_db($this->conn, "online_job_portal_info") or die(mysqli_error($this->conn));
    }
    public function getUserInfo()
    {
        $query = "SELECT * from  employer_info";
        $result  = mysqli_query($this->conn, $query);
        return $result;
    }
    public function insertUserInfo($employer_id, $name, $email, $phone, $password)
    {
        $query = "INSERT INTO employer_info (`employer_id` ,`name`, `email`, `phone`, `password`) VALUES ('$employer_id','$name','$email','$phone','$password')";
        $result  = mysqli_query($this->conn, $query);
        return $result;
    }
    public function getUserInfoWhereId($id)
    {
        $query = "SELECT * from  employer_info WHERE employer_id=$id";
        $result  = mysqli_query($this->conn, $query);
        return $result;
    }
    public function checkUserExists($id)
    {
        $query = "SELECT * from  employer_info  WHERE employer_id=$id";
        $result  = mysqli_query($this->conn, $query);
        return $result;
    }
    public function getProjects()
    {
        $query = "SELECT * from  project_info ORDER BY date DESC";
        $result  = mysqli_query($this->conn, $query);
        return $result;
    }
    public function getProjectsWhereId($id)
    {
        $query = "SELECT * from  project_info  WHERE project_id=$id";
        $result  = mysqli_query($this->conn, $query);
        return $result;
    }
    public function getProjectsAccToCost($range)
    {
        $query = $this->getQuery($range);
        $result  = mysqli_query($this->conn, $query);
        return $result;
    }
    public function getProjectsAccToDate($type)
    {
        $query = $this->getQuery2($type);
        $result  = mysqli_query($this->conn, $query);
        return $result;
    }
    function getQuery($range)
    {
        $sql = "SELECT * FROM `project_info`";
        if (in_array("1000", $range)) {
            $sql .= "WHERE cost<=1000 ORDER BY cost ASC";
        }
        if (in_array("1000-5000", $range)) {
            $sql .= "WHERE cost> 1000 and cost<=5000 ORDER BY cost ASC";
        }
        if (in_array("5000-10000", $range)) {
            $sql .= "WHERE cost> 5000 and cost<=10000 ORDER BY cost ASC";
        }
        if (in_array("10000-50000", $range)) {
            $sql .= "WHERE cost>10000 and cost<=50000 ORDER BY cost ASC";
        }
        if (in_array("50000", $range)) {
            $sql .= "WHERE cost>=50000 ORDER BY cost ASC";
        }
        return $sql;
    }
    function getQuery2($date)
    {
        $sql = "SELECT * FROM `project_info`";
        if ($date == "new") {
            $sql .= "ORDER BY date DESC";
        }
        if ($date == "old") {
            $sql .= "ORDER BY date ASC";
        }

        return $sql;
    }
}
