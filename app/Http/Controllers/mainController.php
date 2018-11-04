<?php

namespace App\Http\Controllers;

use App\Setup;
use App\User;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function myProfile(){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $setups = Setup::where('user_id', '=', $user_id)->get();

        return view('users.your_profile', compact('user' , 'setups'));
    }
}
