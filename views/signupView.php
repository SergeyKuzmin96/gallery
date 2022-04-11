<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profileView.php');
}
?>
<!DOCTYPE html>
<html>
<?php require_once 'template/head.php' ?>

<body>
<!-- main -->
<div class="w3layouts-main">
    <h1>Signup Form</h1>
    <div class="agilesign-form">
        <div class="agileits-top">
            <form autocomplete="off" action="../controllers/signupController.php" method="post">

                <div class="styled-input ">
                    <input type="text" name="login" placeholder="Enter your login"
                           value="<?php echo $_SESSION['login'] ?>">
                    <small class="text-danger">
                        <?php
                        if ($_SESSION['loginError']) {
                            echo $_SESSION['loginError'];
                        }
                        unset($_SESSION['loginError']);
                        ?>
                    </small>

                    <label>Login</label>
                    <span></span>
                </div>
                <div class="styled-input w3ls-text">
                    <input type="text" name="email" placeholder="Enter your email address"
                           value="<?php echo $_SESSION['email'] ?>">
                    <small class="text-danger">
                        <?php
                        if ($_SESSION['emailError']) {
                            echo $_SESSION['emailError'];
                        }
                        unset($_SESSION['emailError']);
                        ?>
                    </small>
                    <label>Email</label>
                    <span></span>
                </div>
                <div class="styled-input w3ls-text">
                    <input type="password" name="password" placeholder="Enter password">
                    <small class="text-danger">
                        <?php
                        if ($_SESSION['passwordError']) {
                            echo $_SESSION['passwordError'];
                        }
                        unset($_SESSION['passwordError']);
                        ?>
                    </small>
                    <label>Password</label>
                    <span></span>
                </div>
                <div class="styled-input w3ls-text">
                    <input type="password" name="password_confirm" placeholder="Confirm your password">
                    <small class="text-danger">
                        <?php
                        if ($_SESSION['password_confirmError']) {
                            echo $_SESSION['password_confirmError'];
                        }
                        unset($_SESSION['password_confirmError']);
                        ?>
                    </small>
                    <label>Confirm Password</label>
                    <span></span>
                </div>

                <div class="agileits-bottom">
                    <input type="submit" value="Sign Up">
                </div>

            </form>
        </div>
        <div class="w3agile-btm">
            <p>Already a member ? <a href="signinView.php"> Sign In</a></p>
        </div>
    </div>
</div>

</body>
</html>