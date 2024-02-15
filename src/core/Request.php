<?php

namespace App\src\core;
class Request
{

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '';
        $mainPath = str_replace("/TicTacToe-framework/public", "", $path);
        $position = strpos($mainPath, '?');

        if ($position === false) {
            return $mainPath;
        }

        //added return, not necessary
        return $path = substr($path, 0, $position);
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet()
    {
        return $this->getMethod() === 'get';
    }

    public function isPost()
    {
        return $this->getMethod() === 'post';
    }

    public function getBody()
    {
        $body = [];

        if ($this->getMethod() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->getMethod() === 'post') {
            foreach ($_POST as $key => $value) {
                if (is_array($value)) {
                    $body[$key] = $value;
                } else {
                    $body[$key] = filter_input(INPUT_POST, $value, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }

        return $body;
    }

}