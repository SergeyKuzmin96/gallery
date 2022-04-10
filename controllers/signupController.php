<?php
session_start();

require_once '../app/validation/signupValidate.php';
require_once '../models/User.php';


$data = $_POST;
$data = signupValidate($data);
if ($data['flag'] == 1) {

    $_SESSION['login'] = $data['login'];
    $_SESSION['email'] = $data['email'];
    Header('Location: ../views/signupView.php');
} else {
    unset($_SESSION['login']);
    unset($_SESSION['email']);

    $user = new User();
    $user->setLogin($data['login']);
    $user->setEmail($data['email']);
    $user->setPassword($data['password']);

    $user->saveUser();
    $_SESSION['message'] = 'Registration was successful!';
    Header('Location: ../views/signinView.php');

}
