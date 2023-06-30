<?php

namespace app\models;

use RedBeanPHP\R;

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

    public function checkUnique($text_error='') // метод для проверки уникальности емаила при регистрации
    {
        $user = R::findOne('user', 'email=?',[$this->attributes['email']]);
        if ($user) {
            // запишем под  ключом уник текст ошибки, если не передан аргументом то будет тот который ниже
            $this->errors['unique'][]= $text_error ?: 'Этот email уже зарегистрирован';
            return false;
        } else {
            return true;
        }
    }

}