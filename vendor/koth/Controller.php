<?php

namespace koth;

// это базовый контролер, от которого невохможно сохдать обьект,но можно и будем наследоваться
abstract class Controller
{
    // запрос от бзера,роутер вызвал соответсвующий КОНТРОЛЕР, контролер запросил данные из модели и передал их в вид
    // именно в массив дата и буду загружаться данные из модели

    public array $data =[]; //это массив с данными для вида (сюда можно положить данные методом сэт в любом контролере)
    public array $meta=['title'=>'','description'=>'','keywords'=>'']; // передача в шаблон метаданных страницы
    public false|string $layout=''; // в конфиге в инит шаблон определен
    public string $view=''; // через контролер мы можем переопределить вид, по умолчанию он соответсвует назва экшна
    public $model; // это обьект модели



    public function __construct(public $route=[]) // роут пропробрасывается (смотри класс роутер, в методе диспатч)
    {

    }


    // получим модель , если таковая создана
    public function getModel()
    {
        // путь к модели, модел называется по имени контролера
        $model = 'app\models\\' . $this->route['admin_prefix'] . $this->route['controller'];

        // смотрим в папку с моделями и смотрим есть ли такая модель- если есть создаим обьект класса модели
        if (class_exists($model)) {
            $this->model = new $model();
        }
    }


    // по умолчанию вью пустая строка, но через контролер вью можно переопределить (в индексЭкшн например)
    public function getView()
    {
        //если вью не путсая строка то запишем ее, если пустая - возьмем вид по умолчанию, название вида совпадаеи с экшном
        $this->view = $this->view ?: $this->route['action'];

        // создаем экз класса Вью === цепочка ткая - получаем данные в роутере - их в контролер - а потом их в вид
        (new View($this->route,$this->layout,$this->view,$this->meta))->render($this->data);
    }


    // метод что бы что то класть в массив $data
    public function set($data)
    {
        $this->data = $data;
    }

    public function setMeta($title='',$description='',$keywords='')
    {
        $this->meta=[
            'title'=>$title,
            'description'=>$description,
            'keywords'=>$keywords,
        ];
    }

    public function isAjax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    public function loadView($view,$vars=[])
    {
        extract($vars);
        require APP . "/views/{$prefix}{$this->route['controller']}/$view.php";
        $prefix = str_replace('\\','/',$this->route['admin_prefix']);
        die();
    }
    public function error_404($folder='error',$view=404,$response=404)
    {
        http_response_code($response);
        $this->route['controller']=$folder;
        $this->view=$view;
    }
}