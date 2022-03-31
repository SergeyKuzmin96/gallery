<?php
session_start();
if ($_SESSION['user']) {
    header('Location: ..\views\profileView.php');
}else{
    header('Location: ..\views\signinView.php');

}