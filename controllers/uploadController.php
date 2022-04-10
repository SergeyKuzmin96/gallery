<?php
session_start();
require_once '../app/validation/imageTypeValidate.php';
require_once '../models/Gallery.php';


$dir_original = "..public/uploads/original/";
$dir_mini = "..public/uploads/mini/";


$user_id = $_SESSION['user']['id'];
$user_login = $_SESSION['user']['login'];
$type = $_FILES['picture']['type'];

if (imageTypeValidate($type)) {
    $unique_name = $user_login . $_FILES['picture']['name'];
    $tmp_name = $_FILES['picture']['tmp_name'];

    $gallery = new Gallery();
    $gallery->newImageById($user_id, $unique_name, $tmp_name, $type);

    $_SESSION['upload_msg'] = 'Файл загружен';

} else {
    $_SESSION['upload_msg'] = 'Неверный тип фала';
}

Header('Location: ../views/profileView.php');



