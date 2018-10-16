<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
    public function register(){
        return view('register');
    }

    public function index(){
        return view('index');
    }

    public function login(){
        return view('login');
    }
}
