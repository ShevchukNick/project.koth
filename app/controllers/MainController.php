<?php
namespace app\controllers;

use app\models\Main;



/** @property Main $model */
class MainController extends AppController
{
    public function indexAction()
    {
        $tests=$this->model->get_hits(3);

        /** методом сыт опраовляю даныне в вид */
        $this->set(compact('tests'));
    }
}