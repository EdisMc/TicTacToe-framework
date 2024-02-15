<?php

namespace App\src\services;

class GameService {
    protected $player;
    protected $board;

    public function __construct()
    {
        $this->board = array_fill(0,3, array_fill(0,3,null));
        $this->player = "X";
    }

    protected function setBoard()
    {
        return $this->board && $this->player;
    }

}