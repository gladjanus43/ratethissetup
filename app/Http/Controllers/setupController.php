<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Setup;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

        $comments = Comment::where('setup_id', '=' , $id)->orderBy('upvotes', 'desc')->get();

        return view('setup.setup_detail', compact('setup','comments'));
    }

    public function setupActive(Request $request){
        Setup::find($request->id)
            ->update([
                'is_active' => $request->isActive
            ]);
        return Redirect::back();
    }
}
