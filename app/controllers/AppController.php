<?php

namespace app\controllers;

use koth\Controller;

/** этгт контрлер расширяет базой конт фрейма, а его в свою очредь будут расщирять уже нужные */
class AppController extends Controller
{
public function __construct($route = [])
{
    parent::__construct($route);
}
}