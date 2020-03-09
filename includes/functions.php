<?php

function checkFields(string $name, string $birthdate): bool
{
    return (empty($name) || empty($birthdate)) ?? true;
}


function validateLetters(string $name): bool
{
    return (preg_match("/[^A-Za-z -]/", $name)) ?? true;
}


function validateFullName(string $name): bool
{
    return (strpos($name, " ") === false) ?? true;

}


function checkAge(string $birthdate): bool
{
    return (time() < strtotime('+18 years', strtotime($birthdate))) ?? true;
}


function validateImage(): bool
{
    $extensions = ['jpg', 'png'];
    $fileNameParts = explode('.', $_FILES['photo']['name']);
    $fileExtension = strtolower(end($fileNameParts));

    return (!in_array($fileExtension, $extensions)) ?? true;
}


function getPhotoPath(): string
{
    $fileNameParts = explode('.', $_FILES['photo']['name']);
    $fileName = $fileNameParts[0];
    $fileExtension = strtolower(end($fileNameParts));

// make new filename for storage combining file name and timestamp
    $storageName = $fileName . '_' . time() . '.' . $fileExtension;
    $fileDestination = 'photos/' . $storageName;

    return $fileDestination;
}