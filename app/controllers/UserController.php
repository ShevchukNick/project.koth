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
                redirect(base_url() . '/user/signup');
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
            redirect(base_url() . '/user/login'); // редирект чтобы не предалагаслсь повтроная отправка формы
        }
        $this->setMeta('Регистрация');
    }

    public function loginAction()
    {
        // если уже автоизован то редирект на гланую страницу
        if (User::checkAuth()) {
            redirect(base_url());
        }
        if (!empty($_POST)) {
            // если массив не пуст то нужно вызвать метод авторизации
            if ($this->model->login()) {
//                $_SESSION['success']='Успешная авторизация';
                redirect(base_url() . '/user/cabinet'); // на в кабинет при упсезе
            } else {
                $_SESSION['errors']='Ошибка авториазции. Логин или пароль введены неверно';
                redirect(); // на эту эе страницу
            }
        }
        $this->setMeta('Авторизация');
    }

    public function logoutAction()
    {
        if (User::checkAuth()) {
           unset($_SESSION['user']);
        }
        redirect(base_url());
    }

    public function cabinetAction()
    {
        if (!User::checkAuth()) {
            redirect(base_url() . '/user/login');
        }

        $user_score = $this->model->get_user_score($_SESSION['user']['id']);
//        debug($user_score);
//        die();
        $this->set(compact('user_score'));
        $this ->setMeta('Профиль');
    }


    public function credentialsAction()
    {
        // если уже автоизован то редирект на гланую страницу
        if (!User::checkAuth()) {
            redirect(base_url() . '/user/login');
        }
        if (!empty($_POST)) {
            if (empty($_POST['password'])) {
                unset($_POST['password']);
            }
            $data = $_POST;
            $this->model->load($data);
            if (!$this->model->validate($data)) {
                $this->model->getErrors();
            } else {
                if (!empty($this->model->attributes['password'])) {
                    $this->model->attributes['password']=password_hash($this->model->attributes['password'] , PASSWORD_DEFAULT);
                }

                if ($this->model->update('user',$_SESSION['user']['id'])) {
                    $_SESSION['success'] = 'Данные учетной записи обновлены';
                    foreach ($this->model->attributes as $k=>$v) {
                        if (!empty($v) && $k != 'password') {
                            $_SESSION['user'][$k]=$v;
                        }
                    }
                } else {
                    $_SESSION['errors'] = 'Ошибка при обновлении';
                }
            }
            redirect(); // редирект чтобы не предалагаслсь повтроная отправка формы
        }

        $this->setMeta('Настройки профиля');
    }


    public function passedAction()
    {

        if (!User::checkAuth()) {
            redirect(base_url() . '/user/login');
        }

        $tests = $this->model->get_passed_tests();


        $this->set(compact('tests'));

        $this->setMeta('пройденные тесты');
    }

    public function avatarAction()
    {
        if (!User::checkAuth()) {
            redirect(base_url() . '/user/login');
        }
        $data= $_POST;

        if (isset($data['set_avatar'])) {
            $avatar = $_FILES['img'];
            if ($this->model->avartar_security($avatar)) {
                $this->model->loadava($avatar);
                $_SESSION['success'] = 'Аватар обновлен';

            } else {
                $_SESSION['errors'] = 'Ошибка при обновлении аватара';
            }
        }
        $this->setMeta('Обновление аватара');
    }

}