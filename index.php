<?php
session_start();
include 'includes/header.php';
include 'includes/footer.php';
require 'Controllers/UsersController.php';
require 'Models/User.php';


$redirect = $_SERVER['REQUEST_URI'];
switch ($redirect) {
    case '/list' :
        require __DIR__ . '/Views/index.php';
        break;
    default:
        require __DIR__ . '/Views/create.php';
        break;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($redirect === '/store') {
        require __DIR__ . '/Views/store.php';
    }
}
