<?php

namespace app\models;

use RedBeanPHP\R;

class Test extends AppModel
{
    public function get_name_test($slug)
    {
        return R::getRow("SELECT t.* FROM tests t WHERE t.status=1 AND t.slug=?", [$slug]);
    }


    public function get_test_data($test_id)
    {
        $test_data = R::getAll("SELECT q.question,q.parent_test, a.id, a.answer, a.parent_question
            FROM questions q LEFT JOIN answers a ON q.id=a.parent_question where q.parent_test=$test_id");


        //формируем новый массив где ключ это номер вопроса + варианты ответа
        $data = array();
        foreach ($test_data as $test_datum) {
            if (!$test_datum) return false;
            $data[$test_datum['parent_question']][0]=$test_datum['question'];
            $data[$test_datum['parent_question']][$test_datum['id']]=$test_datum['answer'];
        }
        return $data;
    }

    public function pagination($count_questions,$test_data) // метод для переключения между вопросами теста
    {
        $keys=array_keys($test_data);
        $pagination='<div class="pagination">';
        for ($i=1;$i<=$count_questions;$i++) {
            $key=array_shift($keys);
            if ($i==1) {
                $pagination .='<a class="nav-active" href="#question-' . $key . '">' . $i . '</a>';
            } else {
                $pagination .='<a href="#question-' . $key . '">' . $i . '</a>';
            }
        }
        $pagination .= '</div>';
        return $pagination;
    }

}