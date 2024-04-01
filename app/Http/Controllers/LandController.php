<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;

class LandController extends Controller
{
    public function index(Type $var = null)
    {
        return view('landing');
    }
}
