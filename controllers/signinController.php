<?php
require_once '../models/User.php';
require_once '../Validator.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = $_POST;

    $validator = new Validator();

    $data = $validator->signinValidate($data);

    if ($data['flag'] != 1) {
        unset($_SESSION['message']);

        $user = new User();
        if ($user->getUserByLogAndPas($data['login'], $data['password'])) {

            Header('Location: ../views/profileView.php');

        } else {
            $_SESSION['message'] = 'Не удаётся войти.Пожалуйста, проверьте правильность написания логина и пароля. ';
        }

    }
    Header('Location: ../views/signinView.php');
}

