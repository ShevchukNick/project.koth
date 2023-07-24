<?php

namespace app\models;

use RedBeanPHP\R;

class Leaderboard extends AppModel
{
    public function get_users_score()
    {
        return $users=R::getAll("SELECT user.name, user.img, userscore.score, SUM(userscore.score) as sum
                                            from userscore  
                                                join user on userscore.userid=user.id GROUP BY userscore.userid ORDER BY sum DESC ");
    }
}