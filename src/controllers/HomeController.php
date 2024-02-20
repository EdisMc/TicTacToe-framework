<?php

namespace App\src\controllers;

use App\src\core\App;
use App\src\services\MultiPlayerService;
use App\src\services\SinglePlayerService;
use JetBrains\PhpStorm\NoReturn;

class HomeController extends Controller
{
    private SinglePlayerService $singlePlayerService;
    private MultiPlayerService $multiPlayerService;

    public function __construct()
    {
        $this->singlePlayerService = new SinglePlayerService();
        $this->multiPlayerService = new MultiPlayerService();
    }

    public function home(): array|false|string
    {
        return App::$instance->controller->renderView('home');
    }

    #[NoReturn] public function reset(): void
    {
        $this->multiPlayerService->reset();
        header('Location: ./', true, 301);
        exit;
    }

    #[NoReturn] public function resetBot(): void
    {
        $this->singlePlayerService->resetBot();
        header('Location: ./', true, 301);
        exit;
    }
}