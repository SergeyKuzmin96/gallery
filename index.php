<?php
session_start();
require_once  'config/init.php';
if ($_SESSION['user']) {
    header('Location: views\profileView.php');
}else{
    header('Location: views\signinView.php');

}