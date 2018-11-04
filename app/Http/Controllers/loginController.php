<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $password = Hash::make($request->password);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password
        ]);

        Auth::login($user);
        return redirect('/');
    }

    public function changeUserDetails(Request $request){
        $user = User::find(Auth::user()->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'description' => $request->description
            ]);
        return Redirect::back();
    }

    public function makeAdmin($id){
        if(Auth::user()->is_admin == true){
            User::find($id)->update([
               'is_admin' => 1
            ]);
            return Redirect::back();
        }else{
            return Redirect::back();
        }
    }

    public function removeAdmin($id){
        if(Auth::user()->is_admin == true){
            $user = User::find($id)->update(['is_admin' => 0]);
            return Redirect::back();
        }else{
            return Redirect::back();
        }
    }

    public function deleteUser($id){
        if(Auth::user()->is_admin == true){
            User::find($id)->delete();
            return Redirect::back();
        }else{
            return Redirect::back();
        }
    }

    public function logOut(){
        Auth::logout();
        return redirect('/');
    }
}
