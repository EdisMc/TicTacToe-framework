<?php

namespace App\src\singleton;

class Singleton {
    private static ?Singleton $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): ?Singleton
    {
        if (self::$instance = null) {
            self::$instance = new Singleton();
        }

        return self::$instance;
    }

}

// point to the same object
$obj1 = Singleton::getInstance();
$obj2 = Singleton::getInstance();
$obj3 = Singleton::getInstance();