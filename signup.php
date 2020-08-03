<?php
    require 'header.php';
?>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign Up</h3>
                <div id="error_msg">
                    <?php
                        include 'includes/errors.inc.php';
                    ?>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="includes/signup.inc.php">

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="E-mail">
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="pwd" class="form-control" placeholder="Password">
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="repeat-pwd" class="form-control" placeholder="Repeat-password">
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-black-tie"></i></span>
                        </div>
<!--                        <input type="text" name="role" class="form-control" placeholder="Repeat-password">-->
                        <select name="role" class="form-control" required>
                            <option value="empty_role_value" disabled selected hidden>Choose a role</option>
                            <option >Editor</option>
                            <option>Admin</option>
                        </select>
                    </div>

<!--                    REMEMBER ME DARYSIM LOGIN FORMOI-->
<!--                    <div class="row align-items-center remember">-->
<!--                        <input type="checkbox">Remember Me-->
<!--                    </div>-->

                    <div class="form-group">
                        <button  type="submit" name="signup-submit" class="btn float-right login_btn">Sign Up</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Already a member?<a href="login.php">Log in!</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require 'footer.php';
?>