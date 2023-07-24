<?php

namespace app\models;

use RedBeanPHP\R;

class User extends AppModel
{
    public array $attributes = [
        "email" => '',
        "password" => '',
        "name" => '',
        'img'=>'',
    ]; // смотри базовую модель ,там есть метод лоад который циклом идет по этим атрибумам и записывеи только нужное(это безоп даные

    public array $rules = [
        'required' => ['email', 'password', 'name'],
        'email' => ['email'],
        'lengthMin' => [
            ['password', 6]
        ],
        'lengthMax' => [
            ['name', 12]
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

    public function get_passed_tests()
    {
//        return R::getAll("SELECT  FROM passedtest WHERE status=1");
        return R::getAll("SELECT t.test_name, t.img, t.slug FROM tests as t 
                                    JOIN passedtest as pt
                                    on t.id = pt.testid WHERE pt.status=1");
    }

    public function get_user_score($user_id)
    {
        return $user_score = R::getAll("SELECT user.name, userscore.score, SUM(userscore.score) as sum
                                            from userscore  
                                                join user on userscore.userid=user.id where $user_id=userscore.userid  GROUP BY userscore.userid ");

    }

    public function avartar_security($avatar)
    {
        $name = $avatar['name'];
        $type = $avatar['type'];
        $size = $avatar['size'];
        $blacklist = [".php",".js",".html"];
        foreach ($blacklist as $item) {
            if (preg_match("/$item\$/i",$name)) return false;
        }
        if (($type != "image/png") && ($type != "image/jpg") &&($type != "image/jpeg")) return false;
        if ($size > 5 *1024 *1024) return false;
        return true;

    }
    public function loadava($avatar)
    {
        $type = $avatar['type'];
        $name = md5(microtime()) . '.' .substr($type,strlen("image/"));
        $dir = "uploads/images/avatars/";
        $uploadfile = $dir . $name;
        $_SESSION['user']['img']=$uploadfile;
        if (move_uploaded_file($avatar['tmp_name'],$uploadfile)) {
            $user = R::findOne('user','id=?',[$_SESSION['user']['id']]);
            $user ->img=$uploadfile;
            R::store($user);
        }
        return true;
    }
}