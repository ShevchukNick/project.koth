<?php
namespace app\controllers;

use koth\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        /** с помощью метода сетмета (баз контро) мы наполняем свойство meta, и когда мы создаем обьект вида (базовый контролер) в конструкторе мы передам эти мета данные */
        $this->setMeta('Главная страница', "описание....", "ключевые слова...");

    }
}