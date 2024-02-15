<?php

namespace App\src\controllers;

use App\src\services\SinglePlayerGameService;

class SinglePlayerController {
    private $singlePlayerGameService;

    public function __construct()
    {
        $this->singlePlayerGameService = SinglePlayerGameService::class;
    }

    public function getSinglePlayerGameService()
    {

    }

}
