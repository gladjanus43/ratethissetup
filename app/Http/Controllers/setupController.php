<?php

namespace App\Http\Controllers;

use App\Setup;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class setupController extends Controller
{
    public function showCreateSetup(){
        return view('create_setup');
    }

    public function createSetup(Request $request){
        $setup = Setup::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description
        ]);
    }

    public function loadSetups(){
        $setups = Setup::orderBy('upvotes', 'title')->get();

        return view('setups', compact('setups'));
    }
}
