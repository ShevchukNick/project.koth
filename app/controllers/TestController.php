<?php

namespace app\controllers;

use app\models\Test;

/** @property Test $model */
class TestController extends AppController
{
    public function viewAction()
    {
        $test_name= $this->model->get_name_test($this->route['slug']);

        if (!$test_name) {
            throw new \Exception('test not === found ');
        }
        $this->setMeta($test_name['test_name']);


        $test_data=$this->model->get_test_data($test_name['id']);



        $this->set(compact('test_name','test_data'));
    }
}