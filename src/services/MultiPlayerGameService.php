<?php

namespace App\src\services;

use App\src\model\Game;
class MultiPlayerGameService
{
    private $game;

    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    public function handleMove($row, $col)
    {
        // Логика за обработка на хода в режим "Person vs Computer"
    }

    public function resetGame()
    {
        // Логика за нулиране на играта в режим "Person vs Computer"
    }

}
