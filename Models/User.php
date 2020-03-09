<?php

namespace Models;

class User
{
    private $name;
    private $birthdate;
    private $photo;
    private $id;

    public function __construct($name, $birthdate, $photo)
    {
        $this->name = $name;
        $this->birthdate = $birthdate;
        $this->photo = $photo;
        $this->id = rand(1000, 9999);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBirthDate(): string
    {
        return $this->birthdate;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }




}