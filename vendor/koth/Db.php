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

//$host='localhost';
//$db='koth';
//$user='root';
//$pass='';
//
//$dsn= "mysql:host=$host;dbname=$db";
//$opt=[
//    \PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION,
//    \PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC
//];
//$pdo = new \PDO($dsn,$user,$pass,$opt);

//$sql = 'SELECT q.question,q.parent_test, a.id, a.answer, a.parent_question FROM questions q LEFT JOIN answers a ON q.id=a.parent_question where q.parent_test=4';
//
//$stmt = $pdo->prepare($sql);
//$stmt->execute();
//$data=null;
//while ($row = $stmt->fetch()) {
//    $data[$row['parent_question']][0] = $row['question'];
//    $data[$row['parent_question']][$row['id']] = $row['answer'];
//}
//echo '<pre>' . print_r($data, 1) . '</pre>';