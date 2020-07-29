<?php

if (isset($_POST['signup-submit'])) {

    require 'db.inc.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $repeat_pwd = $_POST['repeat-pwd'];
    $role = $_POST['role'];

    if (empty($username) || empty($email) || empty($pwd) || empty($repeat_pwd) || empty($role)) {
        header('Location: ../signup.php?error=emptyfields');
        exit();
    };
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9]*$/", $username ))) {
        header('Location: ..signup.php?error=invaliduid');
        exit();
    };
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ..signup.php?error=invalidemail&uid='.$username);
        exit();
    };





















};


