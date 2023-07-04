<?php

namespace app\models;

use RedBeanPHP\R;

class User extends AppModel
{
    public array $attributes = [
        "email" => '',
        "password" => '',
        "name" => ''
    ]; // смотри базовую модель ,там есть метод лоад который циклом идет по этим атрибумам и записывеи только нужное(это безоп даные

    public array $rules = [
        'required' => ['email', 'password', 'name'],
        'email' => ['email'],
        'lengthMin' => [
            ['password', 6]
        ],
        'optional'=>['email','password'],
    ]; // массив правил валилации ->в базовой модели с ними рабоатет метол валидейт -> if все верно то валиадция пройдена

    public array $labels = [
        "email" => 'Email',
        "password" => 'Пароль',
        "name" => 'Имя'
    ];


    public static function checkAuth(): bool
    {
        return isset($_SESSION['user']);
    }

    public function checkUnique($text_error = '') // метод для проверки уникальности емаила при регистрации
    {
        $user = R::findOne('user', 'email=?', [$this->attributes['email']]);
        if ($user) {
            // запишем под  ключом уник текст ошибки, если не передан аргументом то будет тот который ниже
            $this->errors['unique'][] = $text_error ?: 'Этот email уже зарегистрирован';
            return false;
        } else {
            return true;
        }
    }

    public function login($is_admin = false) // по умолчанию авторизация не админа(есди авторизуется админ то нужно пережать тру)
    {
        $email = post('email');
        $password = post('password');
        //если они не пустые(трим их обрезает) - то значит тру
        if ($email && $password) {
            if ($is_admin) {
                $user = R::findOne('user', "email = ? AND role = 'admin'", [$email]);
            } else {
                $user = R::findOne('user', "email = ?", [$email]);
            }
            // в резльтатае этих действий мы должны получить юзера (ну или пустой массив если не достали икого)
            if ($user) {
                // $user->password - это и есть фишка рдбина(мы как бы обращаемся к свойству которые записано в юзере, а там оно появляется когда методом файинван мы достаем обьтект и у этого обьекта(юзера) есть свойство в дан случае пароль)
                if (password_verify($password, $user->password)) {
                    //если пароль верифицирован то запишем в сессию данные польдьзователся
                    foreach ($user as $k => $v) {
                        if (!$k != 'password') {
                            $_SESSION['user'][$k] = $v;
                        }
                    }
                    return true; // если пароль прошел верикфикацию
                }
            }
        }
        return false;
    }

}