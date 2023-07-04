<?php

namespace app\models;

use RedBeanPHP\R;

class Leaderboard extends AppModel
{
    public function get_users()
    {
        return $users=R::getAll("SELECT * from user");
    }
}