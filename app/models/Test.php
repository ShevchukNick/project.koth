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

        return $test_data;

    }

}