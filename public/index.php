<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\src\controllers\MultiPlayerController;
use App\src\controllers\SinglePlayerController;
use App\src\core\App;
use App\src\controllers\HomeController;

$app = new App(dirname(__DIR__));

$app->router->get('/', [HomeController::class, 'home']);
$app->router->get('/reset', [HomeController::class, 'reset']);
$app->router->get('/multiplayer', [MultiPlayerController::class, 'multiplayer']);
$app->router->post('/multiplayer', [MultiPlayerController::class, 'multiplayer']);
$app->router->get('/computer', [SinglePlayerController::class, 'computer']);
$app->router->post('/computer', [SinglePlayerController::class, 'computer']);

$app->run();

