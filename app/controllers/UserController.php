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
            if (!$this->model->validate($data)) {
                $this->model->getErrors(); // метод гетеророс запишем ощибки валидации в сессию (они будут показаны в виде(шаблон
            } else {
                $_SESSION['success'] = 'Учетная запись была успешно создана';
            }
            redirect(); // редирект чтобы не предалагаслсь повтроная отправка формы
        }


        $this->setMeta('Регистрация');
    }

    public function loginAction()
    {
        $this->setMeta('Авторизация');
    }
}