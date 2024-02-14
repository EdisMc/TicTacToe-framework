<?php

namespace App\src\services;

use App\src\model\Game;

class SinglePlayerGameService {
    private $game;

    public function __construct(Game $game) {
        $this->game = $game;
    }

    public function handleMove($row, $col) {
        // Логика за обработка на хода в режим "Person vs Person"
        // (същата логика както преди)
    }

    public function resetGame() {
        // Логика за нулиране на играта в режим "Person vs Person"
        // (същата логика както преди)
    }
}
