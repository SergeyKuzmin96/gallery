<?php
session_start();
require_once 'functions.php';

function signupValidate($data): array
{
    $db = new DB();

    $connect = $db->getConnection();

    $data = clearData($data);
    $login = $data['login'];
    $email = $data['email'];
    $password = $data['password'];
    $password_confirm = $data['password_confirm'];

    $flag = 0;

    if (mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'")) > 0) {
        $_SESSION['loginError'] = 'Данный логин уже занят';
        $flag = 1;
    }
    if (empty($login)) {
        $_SESSION['loginError'] = 'Поле не может быть пустым';
        $flag = 1;
    }
    if (mb_strlen($login) > 10) {
        $_SESSION['loginError'] = 'Логин должен быть не больше 10 символов';
        $flag = 1;
    }

    if (mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'")) > 0) {
        $_SESSION['emailError'] = 'Пользователь с данным Email уже зарегестрирован';
        $flag = 1;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailError'] = 'Формат Email не верный!';
        $flag = 1;
    }
    if (empty($email)) {
        $_SESSION['emailError'] = 'Поле не может быть пустым';
        $flag = 1;
    }

    if (empty($password)) {
        $_SESSION['passwordError'] = 'Поле не может быть пустым';
        $flag = 1;
    }
    if (mb_strlen($password) < 6 && !empty($password)) {
        $_SESSION['passwordError'] = 'Минимальная длинна пароля - 6 символов';
        $flag = 1;
    }

    if (empty($password_confirm)) {
        $_SESSION['password_confirmError'] = 'Поле не может быть пустым';
        $flag = 1;
    }
    if ($password !== $password_confirm) {
        $_SESSION['password_confirmError'] = 'Пароли не совпадают';
        $flag = 1;
    }

    $data['flag'] = $flag;
    return $data;

}
