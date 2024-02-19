<?php

namespace App\src\controllers;

use App\src\core\App;
use App\src\core\Request;
use App\src\services\MultiPlayerService;
use App\src\services\SinglePlayerService;
use JetBrains\PhpStorm\NoReturn;

class HomeController extends Controller
{
    private MultiPlayerService $multiPlayerService;
    private SinglePlayerService $singlePlayerService;

    public function __construct(private Request $request)
    {
        $this->multiPlayerService = new MultiPlayerService();
        $this->singlePlayerService = new SinglePlayerService();
    }

    public function home(): array|false|string
    {
        return App::$app->router->renderView('home');
    }

    #[NoReturn] public function reset(): void
    {
        $this->multiPlayerService->reset();
        header('Location: ./', true, 301);
        exit;
    }

}