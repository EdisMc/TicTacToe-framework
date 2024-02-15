<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\src\core\App;
use App\src\controllers\HomeController;

$app = new App(dirname(__DIR__));

$app->router->get('/', [HomeController::class, 'home']);
$app->router->get('/player', [HomeController::class, 'player']);
$app->router->post('/player', [HomeController::class, 'player']);
$app->router->get('/computer', [HomeController::class, 'computer']);
$app->router->post('/computer', [HomeController::class, 'computer']);

$app->run();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe Game</title>
    <link rel="stylesheet" href="/public/assets/styles.css">
</head>

<body>
</body>

</html>