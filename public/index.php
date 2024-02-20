<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\src\controllers\MultiPlayerController;
use App\src\controllers\SinglePlayerController;
use App\src\controllers\HomeController;
use App\src\core\App;

//get the instance from singleton class
$appInstance = App::getInstance(dirname(__DIR__));

$appInstance->router->get('/', [HomeController::class, 'home']);
$appInstance->router->get('/reset', [HomeController::class, 'reset']);
$appInstance->router->get('/reset-bot', [HomeController::class, 'resetBot']);
$appInstance->router->get('/multiplayer', [MultiPlayerController::class, 'multiplayer']);
$appInstance->router->post('/multiplayer', [MultiPlayerController::class, 'multiplayer']);
$appInstance->router->get('/computer', [SinglePlayerController::class, 'computer']);
$appInstance->router->post('/computer', [SinglePlayerController::class, 'computer']);

$appInstance->run();

