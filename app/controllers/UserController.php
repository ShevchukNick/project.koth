<?php

namespace app\controllers;

use app\models\User;

/** @property User $model */
class UserController extends AppController
{
    public function signupAction()
    {
        // если уже автоизован то редирект на гланую страницу
        if (User::checkAuth()) {
            redirect(base_url());
        }
        if (!empty($_POST)) {
            $data = $_POST;
            $this->model->load($data); // загружем дданые из массива пост, и смотрим что бы туда попало только нужное
            debug($this->model->attributes);
        }
        $this->setMeta('регистрация');
    }

    public function loginAction()
    {
        $this->setMeta('авторизация');
    }
}