<?php

namespace App\Http\Controllers;

use App\Setup;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dotenv\Validator;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    //login post method
    public function login(Request $request){
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data)){
            return redirect('/');
        }else{
            return 'error';
        }
    }

    public function register(Request $request){
        $password = Hash::make($request->password);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password
        ]);

        Auth::login($user);
        return redirect('/');
    }

    public function logOut(){
        Auth::logout();
        return redirect('/');
    }
}
