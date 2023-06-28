<?php

namespace app\controllers;

use app\models\Test;
use koth\App;

/** @property Test $model */
class TestController extends AppController
{
    public function viewAction()
    {
        $test_name= $this->model->get_name_test($this->route['slug']);

        if (!$test_name) {
//            throw new \Exception('test not === found',404);
            $this->error_404();
            return;
        }
        $this->setMeta($test_name['test_name']);


        $test_data=$this->model->get_test_data($test_name['id']);

        $count_question = count($test_data);

        $pagination=$this->model->pagination($count_question,$test_data);

        $this->set(compact('test_name','test_data','count_question','pagination'));
    }

}
