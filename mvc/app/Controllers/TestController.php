<?php

namespace App\Controllers;

class TestController extends Controller
{
    public function index()
    {
        return $this->view('test');
    }
}
