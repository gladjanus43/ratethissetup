<?php

namespace App\Http\Controllers;

use App\Setup;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class setupController extends Controller
{
    public function showCreateSetup(){
        return view('setup.create_setup');
    }

    public function createSetup(Request $request){
        $setup = Setup::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description
        ]);
        $filename = $setup->id;
        $request->setup_picture->storeAs('pictures', $filename . '.png');

        return redirect('/setup/'. $setup->id);
    }

    //load all setups for the setup showcase page
    public function loadSetups(){
        $setups = Setup::orderBy('upvotes', 'title')->get();

        return view('setup.setups', compact('setups'));
    }

    //load single setups for setup detail page
    public function setupDetail($id){
        $setup = Setup::where('id', '=', $id)->first();

        return view('setup.setup_detail', compact('setup'));
    }
}
