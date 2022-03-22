<?php
session_start();
require_once 'DB.php';
class Validator
{
    private $connect;

    public function __construct()
    {

        $this->connect = DB::instance()->getConnection();
    }

    // Метод валидации данных при  регистрации
    public function signupValidate($data): array
    {
        $data = self::clearData($data);

        $login = $data['login'];
        $email = $data['email'];
        $password = $data['password'];
        $password_confirm = $data['password_confirm'];

        $flag = 0;

        if (mysqli_num_rows(mysqli_query($this->connect, "SELECT * FROM `users` WHERE `login` = '$login'")) > 0) {
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

        if (mysqli_num_rows(mysqli_query($this->connect, "SELECT * FROM `users` WHERE `email` = '$email'")) > 0) {
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

        $data['flag'] =  $flag;
        return $data;

    }

    // Метод валидации данных при  авторизации

    public function signinValidate($data): array
    {
        $data = self::clearData($data);

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
        $data['flag'] =  $flag;
        return $data;
    }


    // Метод очистки входных данных от вредоностных скриптов, и недопустимых символов

    private function clearData($data): array
    {
        $attributes = null;
        foreach ($data as $key => $value) {
            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            $attributes["$key"] = htmlspecialchars($value);
        }
        return $attributes;

    }
    // Метод валидации загружаемых изображений

    public function imageTypeValidate($type): bool
    {
        $types = array('image/gif', 'image/png', 'image/jpeg');
        if(in_array($type,$types)){
            return true;
        }
        return false;
    }
}