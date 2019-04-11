<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;
class AppController extends Controller
{
    protected $template = 'default';

    public function __construct()
    {
        $this->viewpath = ROOT . '/app/views/';
    }

    protected function loadTable($Table_name)
    {
       $this->$Table_name = App::getInstance()->getTable($Table_name);
    }
}