<?php

function checkFields(string $name, string $birthdate): bool
{
    return (empty($name) || empty($birthdate)) ?? true;
}


function validateLetters(string $name): bool
{
    return (preg_match("/[^A-Za-zāčēģīķļņšūžĀČĒĢĪĶĻŅŠŪŽ -]/", $name)) ?? true;
}


function validateFullName(string $name): bool
{
    return (strpos($name, " ") === false) ?? true;
}


function checkAge(string $birthdate): bool
{
    return (strtotime($birthdate)>1015756850) ?? true;
}


function validateImage(): bool
{
    if (isset($_FILES['photo']['tmp_name'])) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES['photo']['tmp_name']);
        if ($mime == 'image/png' || $mime == 'image/jpeg') {
            finfo_close($finfo);
            return false;
        }
        finfo_close($finfo);
        return true;
    }
    exit;
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