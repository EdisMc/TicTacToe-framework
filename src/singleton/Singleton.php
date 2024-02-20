<?php

namespace App\src\singleton;

use App\src\controllers\Controller;

class Singleton {
    private static $instance;

    public Controller $controller;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (self::$instance = null) {
            self::$instance = new Singleton();
        }

        return Singleton::$instance;
    }

}