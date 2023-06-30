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
            if (!$this->model->validate($data) || !$this->model->checkUnique()) {
                $this->model->getErrors(); // метод гетеророс запишем ощибки валидации в сессию (они будут показаны в виде(шаблон
                $_SESSION['form-data']=$data; // данные формы введеные юзером(чтоб юзер не вводил еще раз) юзаются в виде
            } else {
                // пароль записываем в атрибуты в хешированном виде, потом с помощью метода сейв это все запишется в бд
                $this->model->attributes['password']=password_hash($this->model->attributes['password'] , PASSWORD_DEFAULT);
                // если возврашестя тру  то успех! тут конечно зависит тру не тру от успеха метода сейв
                if ($this->model->save('user')) {
                    $_SESSION['success'] = 'Учетная запись была успешно создана';
                } else {
                    $_SESSION['errors'] = 'Ошибка при создании нового аккаунта';
                }

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