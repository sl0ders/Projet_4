<?php

namespace App\Controller;

use \App;
class AppController extends Controller
{
    protected $template = 'default';

    public function __construct()
    {
        $this->viewpath = ROOT . '/app/views/';
    }

    protected function loadModel($Model_name)
    {
       $this->$Model_name = App::getInstance()->getModel($Model_name);
    }
}