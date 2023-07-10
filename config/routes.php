<?php
use koth\Router;
// заполняем таблицу маршрутов (этот файл подключается в входном файле)
// ^ - начало строки $ - конец строки
// маршрут в строке, в скобках то с чем нужн соотнести

// более конретые правила выше

// это марщрут для админки, этот для главной страницы админки (если после админ в урл ничего нет)
Router::add('^admin/?$',['controller'=>'Main','action'=>'index','admin_prefix'=>'admin']);
// а это правило применятеся если после админ в урд что то есть
Router::add('^admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)/?$',['admin_prefix'=>'admin']);



//правило для теста (для того чтобы попасть на странциу выбранного теста)
Router::add('^test/add?$',['controller'=>'Test','action'=>'add']); //!!!!!!!!!!!!!!!!!!!10.07


Router::add('^test/(?P<slug>[a-z0-9-]+)/?$',['controller'=>'Test','action'=>'view']);




// это я учусь писать роуты -этот для переключния между вопрсоами теста
//Router::add('^test/(?P<slug>[a-z0-9-]+)/(?P<#question>[0-9]+)/?$',['controller'=>'Test','action'=>'view']);

// это моя фантазия
Router::add('^tests$',['controller'=>'Tests','action'=>'view']);


Router::add('^search$',['controller'=>'Search','action'=>'index']);
Router::add('^search/view?$',['controller'=>'Search','action'=>'view']);

Router::add('^leaderboard$',['controller'=>'Leaderboard','action'=>'index']);



// здесь мы описываем пустую строку - это главная страница, 2 аргумент - пара контроллер и экшн
Router::add('^$',['controller'=>'Main','action'=>'index']);

Router::add('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)/?$');

