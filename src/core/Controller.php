<?php

namespace App\src\core;

class Controller {

    public function render($view, $params = [])
    {
        return App::$app->router->renderView($view, $params);
    }


}