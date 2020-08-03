
<?php
require 'header.php';
?>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
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
                        echo "
                        <p></p>
                        <h3>Hello. Please log in.</h3>
                        <p></p>
                        <div class=\"form-group\">
                            <button  
                                type=\"submit\" 
                                name=\"login-submit\" 
                                class=\"btn float-left login_btn login_button\">
                                <a href=\"login.php\">
                                    Log in
                                </a>
                            </button>
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