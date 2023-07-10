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
            if (!is_array($result)) exit('Ошибка');

            //данные теста
            $test_all_data = $this->model->get_test_data($test);

            // 1 - массив вопрос-ответ, 2 прпвитльные ответы, 3 ответы юзера
            // массив с итогами тестирования
            $test_all_data_result=$this->model->get_test_data_result($test_all_data,$result,$_POST);


            // вывод результататов
            echo $this->model->print_result($test_all_data_result);
            echo "<br>";
            if (!empty($_SESSION['user'])) {
                echo '<a href="/test/add"><button type="button" class="btn btn-warning">Зарегистрировать результат</button></a>';
            }
            echo "<br>";
            echo "<br>";
            echo '<a href="/tests"><button type="button" class="btn btn-warning">К списку тестов</button></a>';
            die;
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////

        $this->set(compact('test_name','test_data','count_question','pagination'));
    }

    public function addAction()
    {
        $data['user_id'] = $_SESSION['user']['id'];
        $data['count_correct_answer'] = $_SESSION['count_correct_answer'];
        Test::add_score($data);

//        debug($_SESSION);
    }

}
