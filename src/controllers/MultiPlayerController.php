<?php

namespace App\src\controllers;

use App\src\RequestHandler;
use App\src\model\Game;
use App\src\view\GameView;
use App\src\services\MultiPlayerGameService; // Промяна

class MultiPlayerController {
    public static function process() {
        $game = new Game();
        $view = new GameView();
        $service = new MultiPlayerGameService($game); // Промяна

        if (RequestHandler::getRequestParameter('reset')) {
            $service->resetGame();
        }

        if (RequestHandler::getRequestParameter('row') && RequestHandler::getRequestParameter('col')) {
            $row = intval(RequestHandler::getRequestParameter('row'));
            $col = intval(RequestHandler::getRequestParameter('col'));
            $service->handleMove($row, $col);
        }

        echo '<h2>Tic Tac Toe (Multi Player Mode)</h2>';
        $view->displayBoard($game->getBoard());

        if ($game->isGameOver()) {
            $view->displayGameOver();
        } else {
            $view->displayCurrentPlayer($game->getCurrentPlayer());
        }

        $view->displayModeSelection();
    }
}
