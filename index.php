<?php
session_start();

include_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/Controllers/UsersController.php';
require_once __DIR__ . '/Models/User.php';


$redirect = $_SERVER['REQUEST_URI'];
switch ($redirect) {
    case '/list' :
        require __DIR__ . '/views/index.php';
        break;
    default:
        require __DIR__ . '/views/create.php';
        break;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($redirect === '/store') {
        require __DIR__ . '/views/store.php';
    }
}

include_once __DIR__ . '/includes/footer.php';