<?php

namespace App\src\controllers;

use App\src\core\App;

class Controller
{
    public string $layout = 'main';

    public function render($view, $params = []): array|bool|string
    {
        return App::$app->router->renderView($view, $params);
    }

}