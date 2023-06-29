<?php

namespace koth;

// базовый класс модели
abstract class Model
{


    public array $attributes=[];  // это свойство для автозаполения модели данными
    public array $errors=[];
    public array $rules=[]; // массив правил валидациии
    public array $labels=[]; // для мультиязычности

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
}