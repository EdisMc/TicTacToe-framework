<?php

namespace App\src;

class RequestHandler {
    public static function getRequestParameter($param) {
        return isset($_GET[$param]) ? $_GET[$param] : null;
    }

}

