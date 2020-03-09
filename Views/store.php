<?php

require 'includes/functions.php';

use Controllers\UsersController;


if (isset($_POST['submit'])) {

    $name = trim(htmlspecialchars($_POST['name']));
    $birthdate = $_POST['birthdate'];
    $_SESSION['name'] = $name;
    $_SESSION['birthdate'] = $birthdate;


    if (checkFields($name, $birthdate)) {
        $_SESSION['msg'] = "Lūdzu, aizpildiet visus laukus!";
        $_SESSION['msgClass'] = "danger";
        $_SESSION['inputField'] = "form-control is-invalid";
        header("location: /create");
        exit;
    }
    unset($_SESSION['inputField']);

    if (validateLetters($name)) {
        $_SESSION['msg'] = "Lūdzu, lietojiet tikai latīņu alfabētu, bez garumzīmēm un mīkstinājuma zīmēm!";
        $_SESSION['msgClass'] = "danger";
        $_SESSION['inputField'] = "form-control is-invalid";
        header("location: /create");
        exit;
    }

    if (validateFullName($name)) {
        $_SESSION['msg'] = "Lūdzu, ierakstiet gan vārdu, gan uzvārdu!";
        $_SESSION['msgClass'] = "danger";
        $_SESSION['inputField'] = "form-control is-invalid";
        header("location: /create");
        exit;
    }

    if (checkAge($birthdate)) {
        $_SESSION['msg'] = "Jums ir jābūt vismaz 18 gadus vecam(-ai)!";
        $_SESSION['msgClass'] = "danger";
        $_SESSION['dateField'] = "form-control is-invalid";
        header("location: /create");
        exit;
    }
    unset($_SESSION['dateField']);

    if (empty($_FILES['photo']['name'])) {

        $_SESSION['msg'] = 'Nav pievienots attēls!';
        $_SESSION['msgClass'] = 'danger';
        header("location: /create");
        exit;
    }

    if (validateImage()) {
        $_SESSION['msg'] = 'Attēlam ir jābūt ar "jpg" vai "png" faila paplašinājumu!';
        $_SESSION['msgClass'] = 'danger';
        header("location: /create");
        exit;

    } else {
        UsersController::createUser();
    }

}