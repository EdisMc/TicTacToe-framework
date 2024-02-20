<?php

namespace App\src\controllers;

use App\src\core\Request;
use App\src\services\MultiPlayerService;
use Error;
use Exception;

class MultiPlayerController extends Controller
{
    private MultiPlayerService $multiPlayerService;

    public function __construct(private Request $request)
    {
        $this->multiPlayerService = new MultiPlayerService();
    }

    public function multiplayer(): array|false|string
    {
        $selectedCell = $this->request->getBody()['cell'] ?? null;

        try {
            if (is_array($selectedCell)) {
                $rowKeys = array_keys($selectedCell);
                $row = array_shift($rowKeys);

                $cellKeys = array_keys($_POST['cell'][$row]);
                $col = array_shift($cellKeys);

                $this->multiPlayerService->setPlayersMoves($row, $col);
                $this->multiPlayerService->checkGameResult();

            }
        } catch (Exception $exception) {
            throw new Error($exception);
        }

        $params = [
            'gameBoard' => $this->multiPlayerService->getBoard(),
        ];

        return $this->render('multiplayer', $params);
    }


}