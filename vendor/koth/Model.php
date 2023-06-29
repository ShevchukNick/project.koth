<?php

namespace koth;

// базовый класс модели
use Valitron\Validator;

abstract class Model
{


    public array $attributes=[];  // это свойство для автозаполения модели данными
    public array $errors=[];
    public array $rules=[]; // массив правил валидациии
    public array $labels=[];

    public function __construct()
    {
        // получим обьект подключения к бд
        Db::getInstance();
    }

    public function load($data)
    {
        foreach ($this->attributes as $name=> $values) {
            if (isset($data[$name])) {
                $this->attributes[$name]=$data[$name]; // заполняем атрибуты по ключу найм, значениеми которые пришли
            }
        }
    }

    public function validate($data):bool
    {
        Validator::langDir(APP . '/languages/validator/lang');
        Validator::lang('ru');
        $validator=new Validator($data);
        $validator->rules($this->rules); // передаем массив рулс экземляру класса Валидатор (правила валидации ищи в модели)
        $validator->labels($this->getLabels());
        // есди валидация пройдена
        if ($validator->validate())  {
            return true;
        } else {
            $this->errors=$validator->errors(); //с помощью метода ерорс (валидатор) получаем ощибки и пишем их в массив ероррс
            return false;
        }
    }

    public function getErrors()
    {
        $errors='<ul>';
        foreach ($this->errors as $error) {
            foreach ($error as $item) {
                $errors .= "<li>{$item}</li>";
            }
        }
        $errors .= '</ul>';
        $_SESSION['errors']=$errors; // ошибки запишем в сесию а занчит их можно показать ( смлотри в шаблоне)
    }

    public function getLabels():array
    {
        $labels=[];
        foreach ($this->labels as $k => $v) {
            $labels[$k]=$v;
        }
        return $labels;
    }
}