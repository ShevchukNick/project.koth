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

    public function get_correct_answers($test) // получаес правильные ответы из бд
    {
        if (!$test) return false;
        $correct_answers = R::getAll("SELECT q.id AS question_id, a.id AS asnwer_id
            FROM questions q
            LEFT JOIN answers a
            ON q.id=a.parent_question where q.parent_test=$test AND a.correct_answer='1'");

        $data = array();
        foreach ($correct_answers as $test_datum) {
            $data[$test_datum['question_id']]=$test_datum['asnwer_id'];
        }
        return $data;

    }

    // 1 - массив вопрос-ответ, 2 прпвитльные ответы, 3 ответы юзера
    public function get_test_data_result($test_all_data,$result,$answer_user) // итоги
    {
        // заполняем $test_all_data правильными ответами и даннысм о неотвеченных вопроссах
        foreach ($result as $q => $a) {
            $test_all_data[$q]['correct_answer']=$a;
            // добалявем в массив данные от неотвеченах вопросах
            if (!isset($_POST[$q])) {
                $test_all_data[$q]['incorrect_answer']=0;
            }
        }
        // add incorect answer if it was
        foreach ($_POST as $q => $a) {
            // в массиве пост данные от пользователя а значить они небезопасны
            //пожтому удаляем то чего там не должно быть
            if (!isset($test_all_data[$q])) {
                unset($_POST[$q]);
            }
            // ответы левые значения ответов тоже удалим
            if (!isset($test_all_data[$q][$a])) {
                $test_all_data[$q]['incorrect_answer']=0;
                continue;
            }
            // доваим неверный ответ
            if ($test_all_data[$q]['correct_answer'] != $a) {
                $test_all_data[$q]['incorrect_answer']=$a;
            }
        }
        return $test_all_data;
    }


    // вывод результататов
    public function print_result($test_all_data_result)
    {
        // переменные результатов
        $all_count=count($test_all_data_result); // count questions
        $correct_answer_count=0; //количетсов верных ответов юзера !!! это важно
        $incorrect_answer_count=0; //количетсов neверных ответов юзера !!! это важно


        foreach ($test_all_data_result as $item) {
            if (isset($item['incorrect_answer'])) $incorrect_answer_count++;
        }
        $correct_answer_count = $all_count - $incorrect_answer_count;


        $print_res = '<div class="test-data">' ;
            $print_res .= '<div class="count-res">';
                $print_res .= "<p>Тест завершен!</p>";
                if ($correct_answer_count==1) {
                    $print_res .= "<p>{$correct_answer_count} правильный ответ из {$all_count}!</p>";
                } else {
                    $print_res .= "<p>{$correct_answer_count} правильных ответов из {$all_count}!</p>";
                }

//                $print_res .= "<p>Верно: {$correct_answer_count}</p>";
//                $print_res .= "<p>Неверное: {$incorrect_answer_count}</p>";
            $print_res .= '</div>';

            // вывод теста
        foreach ($test_all_data_result as $id_question => $item) { // получаем вопрос+отевт
                $correct_answer=$item['correct_answer'];
                $incorrect_answer=null;
                if (isset($item['incorrect_answer'])) {
                    $incorrect_answer=$item['incorrect_answer'];
                    $class = 'question-res error';
                } else {
                    $class = 'question-res ok';
                }
                $print_res .= "<div class='$class '>";
                    foreach ($item as $id_answer=>$answer) { //идеи по массиву ответов
                        if ($id_answer ===0) {
                            $print_res .= "<div class='question__name'>$answer</div>";
                        } elseif (is_numeric($id_answer)) {
                            if ($id_answer == $correct_answer) {
                                $class = 'a ok2';
                            } elseif ($id_answer==$incorrect_answer) {
                                $class = 'a error2';
                            } else {
                                $class='a';
                            }
                            $print_res .= '<div class="d-flex justify-content-center">';
                            $print_res .= '<div class="d-flex justify-content-start">';
                            $print_res .= "<div class='$class'>$answer</div>";
                            $print_res .= "</div>";
                            $print_res .= "</div>";
                        }
                    }
                $print_res .= "</div>";
            }

        $print_res .= '</div>';

        $_SESSION['count_correct_answer']=$correct_answer_count;

        return $print_res;
    }


    public static function add_score($data)
    {
            $user_score = R::dispense('userscore');
            $user_score->userid = $data['user_id'];
            $user_score->testid = $data['t_id'];
            $user_score->score=$data['count_correct_answer'];
            $id_transaction = R::store($user_score);

    }
//    public static function add_passed_test($data)
//    {
//            $pass_test = R::dispense('passedtest');
//            $pass_test->userid = $data['user_id'];
//            $pass_test->testid = $data['t_id'];
//            $pass_test->status = 1;
//            $id_transaction = R::store($pass_test);
//    }


}