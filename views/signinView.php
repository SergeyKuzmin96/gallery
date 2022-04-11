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
    <h1>Sign in Form</h1>
    <div class="agilesign-form">
        <div class="agileits-top">
            <form autocomplete="off" action="../controllers/signinController.php" method="post">
                <div class="styled-input w3ls-text">
                    <input type="text" name="login" required=""/>
                    <label>Login</label>
                    <span></span>
                </div>
                <div class="styled-input w3ls-text">
                    <input type="password" name="password" required="">
                    <label>Password</label>
                    <span></span>
                </div>

                <div class="agileits-bottom">
                    <input type="submit" value="Sign In">
                </div>
            </form>
        </div>
        <div class="w3agile-btm">
            <p>Don't have an account? <a href="signupView.php"> Sign up</a></p>
        </div>
        <?php
        if ($_SESSION['message']) {
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>
    </div>
</div>

</body>
</html>