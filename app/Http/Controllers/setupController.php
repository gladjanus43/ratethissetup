<?php

namespace App\Http\Controllers;

use App\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class setupController extends Controller
{
    public function showCreateSetup(){
        return view('create_setup');
    }

    public function createSetup(Request $request){
        Setup::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description
        ]);
    }
}
