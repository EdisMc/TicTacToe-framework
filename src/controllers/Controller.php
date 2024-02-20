<?php

namespace App\src\controllers;

use App\src\core\App;

class Controller
{
    public function render($view, $params = []): array|bool|string
    {
        return App::$instance->controller->renderView($view, $params);
    }

    public function renderView($view, $params = []): array|false|string
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }


    protected function layoutContent(): false|string
    {
        return file_get_contents(App::$ROOT_DIR . "/src/view/layouts/main.php");
    }

    protected function renderOnlyView($view, $params): void
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        include_once App::$ROOT_DIR . "/src/view/$view.php";

    }

}