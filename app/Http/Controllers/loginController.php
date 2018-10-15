<?php

namespace App\Http\Controllers;

use App\Setup;
use Illuminate\Http\Request;

class loginController extends Controller
{
    //Return login view
    public function showLogin()
    {
        return view('login');
    }

    //login post method
    public function login(){

    }


    //Create page
    public function showCreate()
    {
        return 'create';
    }
}
