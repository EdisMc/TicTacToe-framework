<?php

namespace App\src\controllers;

use App\src\core\App;
use App\src\core\Request;
use JetBrains\PhpStorm\NoReturn;

class BaseController extends Controller
{
    public function home(): bool|array|string
    {
        $params = [
            'name' => "Home Page"
        ];
        return App::$app->router->renderView('home');
    }

    public function multiplayer(): bool|array|string
    {
        $params = [];
        return $this->render('multiplayer', $params);
    }

    #[NoReturn] public function handlePlayerAction(Request $request): string
    {
        $body = $request->getBody();
        dd($body);
        return 'Handle the player action';
    }

    public function computer()
    {
        return App::$app->router->renderView('computer');
    }

    public function handleComputerAction()
    {
        return 'Handle the computer action';
    }
}