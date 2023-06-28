<?php

namespace app\models;

use RedBeanPHP\R;

class Search extends AppModel
{
    public function get_find_tests($s)
    {
        return R::getAll("SELECT * FROM tests WHERE status=1 AND test_name LIKE ?",["%{$s}%"]);
    }
}