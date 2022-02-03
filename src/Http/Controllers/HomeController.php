<?php

namespace ErtugrulDege\ProductFeederSystem\Http\Controllers;

use ErtugrulDege\ProductFeederSystem\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        echo 'Hello World!';
    }
}
