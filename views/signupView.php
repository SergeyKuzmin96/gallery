<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profileView.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Badge Signup Form Flat Responsive Widget Template :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Badge Signup Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="../public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
    <!-- //web font -->
</head>
<body>
<!-- main -->
<div class="w3layouts-main">
    <h1>Signup Form</h1>
    <div class="agilesign-form">
        <div class="agileits-top">
            <form autocomplete="off" action="../controllers/signupController.php" method="post">

                <div class="styled-input ">
                    <input type="text" name="login" placeholder="Enter your login" value="<?php echo $_SESSION['login'] ?>" >
                    <small class="text-danger">
                        <?php
                        if ($_SESSION['loginError']) {
                            echo  $_SESSION['loginError'];
                        }
                        unset($_SESSION['loginError']);
                        ?>
                    </small>

                    <label>Login</label>
                    <span></span>
                </div>
                <div class="styled-input w3ls-text">
                    <input type="text" name="email" placeholder="Enter your email address" value="<?php echo $_SESSION['email'] ?>" >
                    <small class="text-danger">
                    <?php
                    if ($_SESSION['emailError']) {
                        echo  $_SESSION['emailError'];
                    }
                    unset($_SESSION['emailError']);
                    ?>
                    </small>
                    <label>Email</label>
                    <span></span>
                </div>
                <div class="styled-input w3ls-text">
                    <input type="password" name="password" placeholder="Enter password" >
                    <small class="text-danger">
                    <?php
                    if ($_SESSION['passwordError']) {
                        echo  $_SESSION['passwordError'];
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
                        echo  $_SESSION['password_confirmError'];
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
            <p>Already a member ? <a href="signinView.php"> Sign In</a> </p>
        </div>
    </div>
</div>
<!-- //main -->
<!-- copyright -->
<div class="copyright">
    <p>© 2017 Badge Signup Form . All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
</div>
<!-- //copyright -->
</body>
</html>