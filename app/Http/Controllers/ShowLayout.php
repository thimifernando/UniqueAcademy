<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowLayout extends Controller
{
    public function ShowLayout()
    {
        return view('layouts.app');
    }
}
