<?php

namespace app\controllers;

use app\models\Leaderboard;

/** @property Leaderboard $model */
class LeaderboardController extends AppController
{
    public function indexAction()
    {
        $users = $this->model->get_users();

        $this->set(compact('users'));

        $this->setMeta('Таблица лидеров');
    }
}