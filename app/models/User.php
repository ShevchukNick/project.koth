<?php

namespace app\models;

class User extends AppModel
{
    public array $attributes=[
       "email"=> '',
       "password"=> '',
       "name"=> ''
    ]; // смотри базовую модель ,там есть метод лоад который циклом идет по этим атрибумам и записывеи только нужное(это безоп даные



    public static function checkAuth():bool
    {
        return isset($_SESSION['user']);
    }

}