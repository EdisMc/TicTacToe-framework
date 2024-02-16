<?php

namespace App\src\controllers;

use App\src\core\App;
use App\src\core\Request;
use App\src\services\MultiPlayerService;

class HomeController extends Controller
{
    private MultiPlayerService $multiPlayerService;

    public function __construct(private Request $request)
    {
        $this->multiPlayerService = new MultiPlayerService();
    }

    public function home(): array|false|string
    {
        return App::$app->router->renderView('home');
    }

    public function reset()
    {
        $this->multiPlayerService->reset();
        header('Location: ./', true, 301);
        exit;
    }
}