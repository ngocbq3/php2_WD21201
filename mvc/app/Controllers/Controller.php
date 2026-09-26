<?php

namespace App\Controllers;

use eftec\bladeone\BladeOne;

class Controller
{
    public function view($viewName, $data = [])
    {

        $views = __DIR__ . '/../../resources/views';
        $cache = __DIR__ . '/../../resources/cache';
        $blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO); // MODE_DEBUG allows to pinpoint troubles.
        echo $blade->run($viewName, $data); // it calls /views/$viewName.blade.php
    }
}
