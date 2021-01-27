<?php

namespace App\Http\Controllers\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login()
    {
        dd("loggedIn");
    }
}
