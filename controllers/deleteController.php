<?php
session_start();
require_once '../models/Profile.php';

$profile = Profile::instance();
$profile->deleteImage($_GET['name']);
Header('Location: ../views/profileView.php');

