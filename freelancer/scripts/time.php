<?php
date_default_timezone_set('Asia/Kathmandu');
function time_ago($date)
{
    $currentdate = date("Y/m/d H:i:s");
    $currentdate_sec = strtotime($currentdate);
    $diff = abs($currentdate_sec - $date);

    $days = floor($diff / 86400);
    $hours = floor($diff / 3600);
    $min = floor($diff / 60);

    if ($min == 0) {
        return "$diff sec";
    }

    if ($days) {
        return "$days day";
    }
    if ($hours) {
        return "$hours hrs";
    }
    if ($min) {
        return "$min min";
    }
}
