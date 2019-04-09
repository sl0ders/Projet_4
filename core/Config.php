<?php
/**
 * Created by PhpStorm.
 * User: sl0de
 * Date: 29/03/2019
 * Time: 09:25
 */

namespace Core;


class Config
{
    private $settings = [];
    private static $_instance;

    /**
     * @return mixed
     */
    public static function getInstance($file)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    public function __construct($file)
    {
        $this->settings = require ($file);
    }

    public function get($key){
        if (!isset($this->settings[$key])){
            return null;
        }
        return $this->settings[$key];
    }
}