<?php

namespace app\controllers;

use koth\App;

class TestController extends AppController
{
    public function viewAction()
    {

        var_dump($_SERVER['REQUEST_METHOD']);
    }
}