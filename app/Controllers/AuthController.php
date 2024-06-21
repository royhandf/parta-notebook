<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function index()
    {
        return view('pages/auth/login');
    }
    
    public function register()
    {
        return view('pages/auth/register');
    }
}