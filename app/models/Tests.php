<?php

namespace app\models;

use RedBeanPHP\R;

class Tests extends AppModel
{
    public function get_all_tests()
    {
        return R::getAll("SELECT * FROM tests WHERE status=1");
    }
}