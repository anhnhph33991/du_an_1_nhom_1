<?php

namespace App\Commons;

use eftec\bladeone\BladeOne;

class Controller
{
    public function renderView($view, $data, $type)
    {
        $tempPath = __DIR__ . "/../Views/{$type}";
        $cache = __DIR__ . "/../Views/Compiles";
        $blade = new BladeOne($tempPath, $cache);
        echo $blade->run($view, $data);
    }

    public function viewAdmin($view, $data = [])
    {
        return $this->renderView($view, $data, 'Admin');
    }

    public function viewClient($view, $data = []) {
        return $this->renderView($view, $data, 'Client');
    }
}
