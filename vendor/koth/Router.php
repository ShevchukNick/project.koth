<?php

namespace koth;

// маршрутизатор
class Router
{
    protected static $routes = []; // таблица маршрутов
    protected static $route = []; // конкретный текущий маршрут


    /* добалвяем в таблицу машруштов  - текущий машрут(это опциональный массив в который указваем какой контроллер и экшн надо сосотнетси с шаблоном резуляного выражения) */
    public static function add($regexp,$route=[])
    {
      self::$routes[$regexp]=$route;
    }
    public static function getRoutes()
    {
        return self::$routes;
    }
    public static function getRoute()
    {
        return self::$route;
    }


    // это служебный метод, который убирает строку запроса из самого запроса (для того чтобы отсечь гет параметры)
    protected static function removeQueryString($url)
    {
        if ($url) {
            $params=explode('&',$url,2); // то что нахожится после первого & попадет во 2 элемент массива

            //теперь надо посомтреть нет ли гет параметров (то есть знака =) в 1 элементе массива
            if (false === str_contains($params[0],'=')) {
                return rtrim($params[0],'/');
            }
        }
        return '';
    }


    // с помощью это метода мы запишем в ротер текщий УРЛ (вызывается в классе Апп)
    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            // если найено соответсвеие маршрутов, создадим обьект для данного контроллера
            $controller = 'app\controllers\\' . self::$route['admin_prefix'] . self::$route['controller'] . 'Controller';
            // теперь нужно пропверить вообще сущейтсвет или нет такой контроллер
            if (class_exists($controller)) {
                $controllerObject = new $controller(self::$route); // это эксземпляр класса которые находятся в папке controllers

                $controllerObject->getModel();

                $action = self::lowerCamelCase(self::$route['action'] . 'Action'); //экшены которые расписаны в contr...

                //если у контролера есть вызываемый экшн , то его и вызыввем
                if (method_exists($controllerObject,$action)) {
                    $controllerObject->$action();
                } else {
                    throw new \Exception("method {$controller}::{$action} not found",404);
                }
            } else {
                throw new \Exception("Controller {$controller} not found",404);
            }
        } else {
            throw new \Exception('page not found',404);
        }
    }


    // здесь будем сравнивать поступивший запрос с таблицей маршуртов,с теми маршрутами котоыре есть в роутере
    public static function matchRoute($url) : bool
    {
        foreach (self::$routes as $pattern => $route) {
            // ищем соответсвие в табдице маршрутов
            if (preg_match("#{$pattern}#",$url, $matches)) {
                //мало знать что найдено соответсвие, надо знать на какой именно контр и экш отпралять запрос
                foreach ($matches as $k=>$v) {
                    // в матчес хранятся ключи с цифрами и строками, нам нужны именно строки
                    if (is_string($k)) {
                        //есди строка то запигем в роут (например $route['main']='test';
                        $route[$k]=$v;
                    }
                }
                if (empty($route['action'])) {
                    $route['action']='index';
                }
                if (!isset($route['admin_prefix'])) {
                    $route['admin_prefix'] = '';
                } else {
                    $route['admin_prefix'] .='\\';
                }

                // приводим к аппер кейсу (все дело в том что у нас контролеры бууут заываться ex. UserController)
                $route['controller']=self::upperCamelCase($route['controller']);
                self::$route=$route;
                // возвращае тру если найлено соответствие маршрута с запросом
                return true;
            }
        }
        return false;
    }


    // metod для форматирования запроса (чтобы в роутер попадало все без дефисов, v CamelCase)
    protected static function upperCamelCase($name):string
    {
        $name= str_replace('-',' ',$name); // new-test -> new test
        $name=ucwords($name); // new test -> New Test
        $name= str_replace(' ','',$name); // New Test -> NewTest
        return $name;
    }
    // а этот экшн будет преобраховывать в camelCase
    protected static function lowerCamelCase($name):string
    {
        return lcfirst(self::upperCamelCase($name));
    }


}