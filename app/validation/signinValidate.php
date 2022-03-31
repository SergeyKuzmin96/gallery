<?php
session_start();
require_once 'functions.php';

function signinValidate($data): array
{
    $data = clearData($data);

    $login = $data['login'];
    $password = $data['password'];

    $flag = 0;
    if (empty($login)) {
        $_SESSION['message'] = 'Введите логин и пароль';
        $flag = 1;
    }
    if (empty($password)) {
        $_SESSION['message'] = 'Введите логин и пароль';
        $flag = 1;
    }
    $data['flag'] = $flag;
    return $data;
}