<?php

class session
{
    function check()
    {
        session_start();
        $session = $_SESSION["employer_id"];
        if ($session) {
            return true;
        }
        return false;
    }
    function delete()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location:./login.php?logout=success");
    }
}
if (array_key_exists('signout_button', $_GET)) {

    $session = new session;
    $session->delete();
} else if (array_key_exists('check_button', $_GET)) {
    $session = new session;
    $session->check();
}
