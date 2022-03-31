<?php
session_start();
require_once '../models/Gallery.php';

$gallery = new Gallery;
$_SESSION['gallery'] = $gallery->getImagesByUserId();

