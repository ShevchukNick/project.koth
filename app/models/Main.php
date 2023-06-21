<?php

namespace app\models;


use RedBeanPHP\R;

class Main extends AppModel
{
    public function get_hits($limit):array
    {
        return R::getAll("SELECT t.* FROM tests t WHERE t.status=1 AND t.hit=1 LIMIT $limit");
    }
}