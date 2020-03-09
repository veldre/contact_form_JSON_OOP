<?php

namespace Controllers;

use Models\User;


class UsersController
{
    public static function getUsers()
    {
        $users = [];
        $data = json_decode(file_get_contents('users.json'));

        foreach ($data as $user) {
            $users[$user->full_name] = new User(
                $user->full_name,
                $user->birth_date,
                $user->photo
            );
        }
        return $users;
    }


    public static function createUser()
    {
        $name = trim($_POST['name']);
        $birthdate = ($_POST['birthdate']);
        $photo = getPhotoPath();

        move_uploaded_file($_FILES['photo']['tmp_name'], $photo);

//creating new user
        $newUser = new User($name, $birthdate, $photo);
        $user = [
            "id" => $newUser->getId(),
            "full_name" => $newUser->getName(),
            "birth_date" => $newUser->getBirthDate(),
            "photo" => $newUser->getPhoto()
        ];

        $storedData = file_get_contents('users.json');
        $json_arr = json_decode($storedData);
        $json_arr [] = $user;

//// encode back to json and save to same file
        file_put_contents('users.json', json_encode($json_arr));

        $_SESSION['msg'] = "User $name has been added!";
        $_SESSION['msgClass'] = "success";
        unset($_SESSION['name']);
        unset($_SESSION['birthdate']);

        header("location: /list");
    }

}