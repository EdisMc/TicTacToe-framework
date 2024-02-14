<?php

namespace App\src;

class Dispatcher {
    public static function dispatch() {
        $mode = RequestHandler::getRequestParameter('mode');
        switch ($mode) {
            case 'person':
                require_once _DIR_ . '/controllers/SinglePlayerController.php';
                controllers\SinglePlayerController::process();
                break;
            case 'computer':
                require_once _DIR_ . '/controllers/MultiPlayerController.php';
                controllers\MultiPlayerController::process();
                break;
            default:
                require_once _DIR_ . '/View/GameView.php';
                $view = new View\GameView();
                $view->displayModeSelection();
                break;
        }
    }
}
