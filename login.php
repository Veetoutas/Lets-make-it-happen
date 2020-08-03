
<?php
    require 'header.php';
?>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body">

                    <form method="POST" action="includes/login.inc.php">

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control" placeholder="Username/E-mail">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="pwd" class="form-control" placeholder="Password">
                        </div>
<!--                        <div class="row align-items-center remember">-->
<!--                            <input type="checkbox">Remember Me-->
<!--                        </div>-->
                        <div class="form-group">
                            <button  type="submit" name="login-submit" class="btn float-right login_btn">Log in</button>
                        </div>

                    </form>


                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links signin_button">
                        Not a member yet?<a href="signup.php" >Sign up!</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php
    require 'footer.php';
?>