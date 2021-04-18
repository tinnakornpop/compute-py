<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComController extends Controller
{
    public function index()
    {
        return view("computer.index");
    }

    public function test()
    {
        return view("computer.test");
    }
}
