<?php
session_start();
require_once '../models/Gallery.php';

$gallery = new Gallery();
$gallery->deleteImage($_GET['name']);

Header('Location: ../views/profileView.php');

