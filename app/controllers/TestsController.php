<?php

namespace app\controllers;

use app\models\Tests;

/** @property Tests $model */
class TestsController extends AppController
{
    public function viewAction()
    {
        $tests = $this->model->get_all_tests();
        if (!$tests) {
            throw new \Exception('tests not === found ');
        }
        $this->setMeta('Список тестов');
        $this->set(compact('tests'));
    }
}