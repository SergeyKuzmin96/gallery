<?php
session_start();
require_once '../Validator.php';
require_once '../models/Profile.php';


$dir_original = "..src/uploads/original/";
$dir_mini = "..src/uploads/mini/";


$user_id = $_SESSION['user']['id'];
$user_login = $_SESSION['user']['login'];
$type = $_FILES['picture']['type'];

$validator = new Validator();
if ($validator->imageTypeValidate($type)) {

    $unique_name =  $user_login . $_FILES['picture']['name'];
    $tmp_name = $_FILES['picture']['tmp_name'];

    $gallery = new Profile();
    $gallery->newImageById($user_id, $unique_name, $tmp_name, $type);

    $_SESSION['upload_msg'] = 'Файл загружен';

} else {

    $_SESSION['upload_msg'] = 'Неверный тип фала';

}

Header('Location: ../views/profileView.php');



