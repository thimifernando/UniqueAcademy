<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {   
        $user = auth()->user();
        return view('profile.profile',compact('user'));
    }
}
