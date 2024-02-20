<?php

namespace App\src\core;

use App\src\controllers\Controller;

class App
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public static App $instance;

    private function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->controller = new Controller();
        $this->router = new Router($this->request, $this->response);
    }

    //Singleton implementation
    public static function getInstance($rootPath): App
    {
        if (!isset(self::$instance)) {
            self::$instance = new self($rootPath);
        }

        return self::$instance;
    }

    public function run(): void
    {
        echo $this->router->resolve();
    }

}