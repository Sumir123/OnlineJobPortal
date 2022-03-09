<?php
$err_msg = $validation = $status = $err_cName = $err_cEmail =  $err_cPhone =  $err_cPassword = $err_confirmPassword = "";

if ($comapnyName == "") {
    $err_cName = true;
}
if ($comapnyEmail == "" || !filter_input(INPUT_POST, "cEmail", FILTER_VALIDATE_EMAIL)) {
    $err_cEmail = "Invalid Email format";
}
if ($comapnyPhone == "" || !preg_match("/^[0-9]/", $comapnyPhone) || !preg_match("/^98[0-9]{8}$/", $comapnyPhone)) {
    $err_cPhone = "Invalid phone number";
}
if ($comapnyPassword == "" || $confirmPassword == "") {
    $err_cPassword = $err_confirmPassword = "Enter a password";
} elseif ($confirmPassword == "") {
    $err_confirmPassword = "Confirm password";
} elseif (!preg_match("/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,32}/", $comapnyPassword)) {
    $err_cPassword = "Not Strong password";
} elseif ($comapnyPassword != $confirmPassword) {
    $err_cPassword = $err_confirmPassword = "Password donot match";
} else {
    $validation = "confirm";
}
