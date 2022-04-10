<?php
require_once '../app/DB.php';

class User
{
    private $id;
    private $login;
    private $email;
    private $password;

    public $connect;

    public function __construct()
    {
        $db = new DB;
        $this->connect = $db->getConnection();

    }

    //Метод сохранения пользователя в БД
    public function saveUser()
    {
        mysqli_query($this->connect, "INSERT INTO `users` (`login`, `email`, `password`) VALUES ('$this->login', '$this->email', '$this->password')");
    }

    //Метод получения пользователя из БД
    public function getUserByLogAndPas($login, $password): bool
    {
        $password = md5($password);
        $check_user = mysqli_query($this->connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
        if (mysqli_num_rows($check_user) > 0) {

            $user = mysqli_fetch_assoc($check_user);
            self::setId($user['id']);
            self::setLogin($user['login']);
            self::setEmail($user[$this->email]);

            $_SESSION['user'] = [
                "id" => $user['id'],
                "login" => $user['login'],
                "email" => $user['email'],

            ];
            return true;
        }
        return false;
    }


    public function setId($id)
    {
        $this->id = $id;

    }

    public function setLogin($login)
    {
        $this->login = $login;

    }

    public function setEmail($email)
    {
        $this->email = $email;

    }

    public function setPassword($password)
    {
        $this->password = md5($password);

    }


}