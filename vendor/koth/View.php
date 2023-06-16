<?php

namespace koth;

class View
{
    /* Фреймфорки разделяют пнятия шаблон и предсавление. Шаблон это что то неизменное повторяюзеется на сайте хедер футер), а еще есть конентая часть.  В пеоеменой контент находится контетная часть со всемми переменными, и эта часть будет подлюкчать в неизменный шаблон */
    public string $content = '';

    public function __construct(
        public $route,
        public $layout= '',
        public $view='',
        public $meta=[],
    )
    {
        if (false!== $this->layout) {
            $this->layout=$this->layout ?: LAYOUT;
        }
    }


    // метод который отрисовывает страницу (подклчюает шаблон, вставоет в него вид, передает данные в него )
    public function render($data)
    {
        if (is_array($data)) {
            extract($data);
        }

        // admin\ -> admin/ -это понадобится для коректного указания пути
        $prefix = str_replace('\\','/',$this->route['admin_prefix']);

        // путь к файлу вида
        $view_file=APP . "/views/{$prefix}{$this->route['controller']}/{$this->view}.php";

        //что бы что то увидеть пытаемся подключить даннный файл
        if (is_file($view_file)) {

            ob_start(); // не выводим вид а буферизируем
            require_once $view_file;
            $this->content = ob_get_clean(); //  вид заюираем из буфера в свойство контент ( потом ниже контент вствить в шаблон)

        } else {
            throw new \Exception("не найден вид {$view_file}",500);
        }

        // если щаблон сущетсвует - подлючаем шаблон (это  фоторамка, а  фото в свойстве контент, и в шаблоне его надо подключть)
        if (false !== $this->layout) {
            $layout_file=APP . "/views/layouts/{$this->layout}.php"; // путь к шаблону
            if (is_file($layout_file)) {
                require_once $layout_file;
            } else {
                throw new \Exception("не найден шаблон {$layout_file}",500);
            }


        }
    }
}