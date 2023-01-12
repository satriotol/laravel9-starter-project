<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function beranda()
    {
        return view('welcome');
    }
}
