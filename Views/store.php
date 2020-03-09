<?php

require 'includes/functions.php';
use Controllers\UsersController;


if (isset($_POST['submit'])) {

    $name = trim(htmlspecialchars($_POST['name']));
    $birthdate = $_POST['birthdate'];
    $_SESSION['name'] = $name;
    $_SESSION['birthdate'] = $birthdate;


    if (checkFields($name, $birthdate)) {
        $_SESSION['msg'] = "Please fill all fields!";
        $_SESSION['msgClass'] = "danger";
        $_SESSION['inputField'] = "form-control is-invalid";
        header("location: /create");
        exit;
    }

    if (validateLetters($name)) {
        $_SESSION['msg'] = "Name must contain only letters!";
        $_SESSION['msgClass'] = "danger";
        $_SESSION['inputField'] = "form-control is-invalid";
        header("location: /create");
        exit;
    }

    if (validateFullName($name)) {
        $_SESSION['msg'] = "Name must contain both first and last name!";
        $_SESSION['msgClass'] = "danger";
        $_SESSION['inputField'] = "form-control is-invalid";
        header("location: /create");
        exit;
    }

    if (checkAge($birthdate)) {
        $_SESSION['msg'] = "You must be at least 18 years old!";
        $_SESSION['msgClass'] = "danger";
        $_SESSION['dateField'] = "form-control is-invalid";
        header("location: /create");
        exit;
    }

    if (empty($_FILES['photo']['name'])) {

        $_SESSION['msg'] = 'No image added!';
        $_SESSION['msgClass'] = 'danger';
        header("location: /create");
        exit;
    }

    if (validateImage()) {
        $_SESSION['msg'] = 'Image file must have "PNG" or "JPG" extension!';
        $_SESSION['msgClass'] = 'danger';
        header("location: /create");
        exit;

    } else {
        UsersController::createUser();
    }

}