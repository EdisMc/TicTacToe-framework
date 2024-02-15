<?php

namespace App\src\controllers;

use App\src\core\App;
use App\src\core\Controller;

class HomeController extends Controller {

    public function home()
    {
        $params = [
            'name' => "HomePage"
        ];
        return App::$app->router->renderView('home');
    }

    public function player()
    {
        $params = [];
        return $this->render('player', $params);
    }


    public function computer()
    {
        return App::$app->router->renderView('computer');
    }

    public function handleComputerAction()
    {
        return 'Handle the Comp Action';
    }

}