<?php
// SIGN UP error messages
if (isset($_GET['error'])) {
    $err_msg = $_GET['error'];
    if ($_GET['error'] == "invalidusernameemail") {
        echo '<p class="signuperror">Invalid username or e-mail</p>';
    }
    else if ($_GET['error'] == "invalidusername") {
        echo '<p class="signuperror">Invalid username</p>';
    }
    else if ($_GET['error'] == "invalidemail") {
        echo '<p class="signuperror">Invalid  e-mail</p>';
    }
    else if ($_GET['error'] == "passwordcheck") {
        echo '<p class="signuperror">Your passwords do not match!</p>';
    }
    else if ($_GET['error'] == "usertaken") {
        echo '<p class="signuperror">Username is already taken!</p>';
    }
}
else if (isset($_GET['signup'])) {
    $success_msg = $_GET['signup'];
    if ($success_msg == 'success') {
        echo "<p class='signuperror'>Sign up successful. You can <a href=\"login.php\">Log in!</a></p>";
    }
}
