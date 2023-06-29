<?php

namespace app\models;

class User extends AppModel
{
    public array $attributes=[
       "email"=> '',
       "password"=> '',
       "name"=> ''
    ]; // смотри базовую модель ,там есть метод лоад который циклом идет по этим атрибумам и записывеи только нужное(это безоп даные

    public array $rules = [
        'required'=> ['email','password','name'],
        'email'=> ['email'],
        'lengthMin'=>[
          ['password',6]
        ],
    ]; // массив правил валилации ->в базовой модели с ними рабоатет метол валидейт -> if все верно то валиадция пройдена


    public array $labels = [
        "email"=> 'Email',
        "password"=> 'Пароль',
        "name"=> 'Имя'
    ];

    public static function checkAuth():bool
    {
        return isset($_SESSION['user']);
    }

}