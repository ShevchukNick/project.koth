<?php

namespace app\controllers;

use app\models\Search;

/** @property Search $model */
class SearchController extends AppController
{
    public function indexAction()
    {
        $this->setMeta('Поиск по сайту');
    }
    public function viewAction()
    {
        $s=get('s','s');

        $tests=$this->model->get_find_tests($s);
        $this->setMeta('Результаты поиска');
        $this->set(compact('tests'));
    }
}