<?php

if (isset($_POST['signup-submit'])) {

    require 'db.inc.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $repeat_pwd = $_POST['repeat-pwd'];
    $role = $_POST['role'];

    // We check to see if the users inputs are spelled correctly and check for empty fields
    if (empty($username) || empty($email) || empty($pwd) || empty($repeat_pwd)) {
        header('Location: /signup.php?error=emptyfields&username='.$username.'&email='.$email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9]*$/", $username ))) {
        header('Location: /signup.php?error=invalidusernameemail&role='.$role);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: /signup.php?error=invalidemail&username='.$username.'&role='.$role);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username )) {
        header('Location: /signup.php?error=invalidusername&email='.$email.'&role='.$role);
        exit();
    }
    else if ($pwd !== $repeat_pwd) {
        header('Location: /signup.php?error=passwordcheck&username='.$username.'&email='.$email.'&role='.$role);
        exit();
    }
    else if ($role == NULL) {
        header('Location: /signup.php?error=emptyrole&username='.$username.'&email='.$email);
        exit();
    }

    // Now we check if a user already exists with that username or e-mail
    else {
        $sql = "SELECT * FROM users WHERE nameUsers=? OR emailUsers=?";
        $stmt = mysqli_connect($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: signup.php?error=sqlerror');
            exit();
        }
        else  {
            mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header('Location: signup.php?error=usertaken');
                exit();
            }
            // If the user is not taken we insert the new one to DB
            else {
                $sql = "INSERT INTO users (nameUsers, emailUsers, pwdUsers, role) VALUE (?, ?, ?, ?)";
                $stmt = mysqli_connect($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header('Location: signup.php?error=sqlerror');
                    exit();
                }
                else {
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, 'ssss', $username, $email, $hashedPwd, $role);
                    mysqli_stmt_execute($stmt);
                    header('Location: signup.php?signup=success');
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else {
    header('Location: signup.php?');
    exit();
}



