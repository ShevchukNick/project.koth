<?php

namespace koth;

use RedBeanPHP\R;

class Db
{
    use TSingleton;

    private function __construct()
    {
        $db= require_once CONFIG . '/config_db.php';
        R::setup($db['dsn'],$db['user'],$db['password']); // подклчюемся к бд
        // для того чтобы убедтися в том что подключение утсановлено
        if (!R::testConnection()) {
            throw new \Exception('нет соеднинения с базой данных',500);
        }
        R::freeze(true);// замораживаем схему бд
        if (DEBUG) {
            R::debug(true,3); // включаем дебаг если режим отладки включен
        }

    }
}