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

        ////////////////////////////////////////////////////////////////////////////////////////////////////


        if (isset($_POST['test'])) {
            $test = (int) $_POST['test'];
            unset($_POST['test']);
            $result=$this->model->get_correct_answers($test); // массвив верных ответов
//            print_r($_POST);
//            print_r($result);
            if (!is_array($result)) exit('Ошибка');
            //данные теста
            $test_all_data = $this->model->get_test_data($test);
            print_r($test_all_data);
            die;
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////

        $this->set(compact('test_name','test_data','count_question','pagination'));
    }

}
