<?php

if (isset($_POST['login-submit'])) {

    require 'db.inc.php';

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    // We check to see if the users inputs are spelled correctly and check for empty fields
    if (empty($username || $pwd)) {
        header('Location: ../login.php?error=emptyfields');
        exit();
    }

    // Now we check if a user already exists with that username or e-mail
    else {

        $sql = "SELECT * FROM users WHERE nameUsers=? OR emailUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../login.php?error=sqlerror');
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, 'ss', $username, $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($pwd, $row['pwdUsers']);
                if($pwdCheck == false) {
                    header('Location: ../login.php?error=wrongpwd');
                    exit();
                }

                else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userName'] = $row['nameUsers'];
                    $_SESSION['userRole'] = $row['role'];
                    header('Location: ../index.php?login=success');
                    exit();
                }

            }

            else {
                header('Location: ../index.php?error=wrongpwd');
                exit();
            }

        }
    }
}

// Just in case a hacker managed to go through validation, redirect him to index.php
else {
    header('Location: ../index.php?');
    exit();
}
