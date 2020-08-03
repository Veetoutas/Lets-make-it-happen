
<?php
require 'header.php';
?>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Hello, please log in.</h3>
                <?php
                    if(isset($_SESSION['userId'])) {
                        $user = $_SESSION['userName'];
                        $role = $_SESSION['userRole'];
                        echo
                        "<h3>Hello, <span class='session_username'>$user</span> !</h3>
                              <p class='role_msg'>You ar an <span class='session_role'>$role</span></p>
                              <form action='includes/logout.inc.php' method='post'>
                                <button class='logout_button' type='submit' name='logout-submit'>Logout</button>
                              </form>";
                    }
                    else {
                        echo ">
                                <a href='login.php' type=\"submit\" name=\"signup-submit\" class=\"btn float-left login_btn\">
                                    Log in
                                </a>
                            </button>
                        </div>
                        <div class=\"card-footer\">
                            <div class=\"d-flex justify-content-left links signin_button\">
                                Not a member yet?<a href=\"signup.php\" >Sign up!</a>
                            </div>
                        </div>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>