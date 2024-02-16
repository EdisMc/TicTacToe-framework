<?php

namespace App\src\controllers;

use App\src\core\Request;
use App\src\services\SinglePlayerService;
use Error;
use Exception;

class SinglePlayerController extends Controller
{
    private SinglePlayerService $singlePlayerService;

    public function __construct(private Request $request)
    {
        $this->singlePlayerService = new SinglePlayerService();
    }

    public function computer(): false|array|string
    {
        $selectedCell = $this->request->getBody()['cell'] ?? null;

        try {
            if (isset($_POST['cell'])) {
                if (is_array($selectedCell)) {
                    $rowKeys = array_keys($selectedCell);
                    $row = array_shift($rowKeys);

                    $cellKeys = array_keys($_POST['cell'][$row]);
                    $col = array_shift($cellKeys);

                    $this->singlePlayerService->getPlayerMove($row, $col);
                    $this->singlePlayerService->setBotMoves();
                    $this->singlePlayerService->checkGameResult();
                }
            }
        } catch (Exception $exception) {
            throw new Error($exception);
        }

        $params = [
            'gameBoard' => $this->singlePlayerService->getBoard(),
        ];

        return $this->render('computer', $params);
    }

}