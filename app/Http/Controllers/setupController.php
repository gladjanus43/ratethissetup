<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Setup;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class setupController extends Controller
{
    public function showCreateSetup(){
        $categories = Category::all();

        return view('setup.create_setup', compact('categories'));
    }

    public function createSetup(Request $request){
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'setup_picture' => 'required|image'
        ]);

        $setup = Setup::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category
        ]);
        $filename = $setup->id;
        $request->setup_picture->storeAs('pictures', $filename . '.png');

        return redirect('/setup/'. $setup->id);
    }

    //load all setups for the setup showcase page
    public function loadSetups(Request $request){
        $categories = Category::all();
        $title = $request->title;
        $body = $request->body;

        $filters = $title . ' ' . $body;
//        $setups = Setup::where('title', 'LIKE', '%'.$title.'%')
//            ->where('description', 'LIKE', '%'.$body.'%')
//            ->where('is_active', '=', '1')
//            ->orderBy('setups.upvotes', 'setups.title')->get();

        $setups = Setup::where('setups.title', 'LIKE', '%'.$title.'%')
            ->where('setups.description', 'LIKE', '%'.$body.'%')
            ->where('setups.is_active', '=', '1')
            ->join('comments', 'setups.id' ,'=' , 'comments.setup_id')
            ->select('setups.*', DB::raw('count(comments.id) as amount_comments'))
            ->groupBy('setups.id')->get();

        return view('setup.setups', compact('setups', 'filters', 'categories'));
    }

    public function setupsPerCategory($name){
        $categories = Category::all();
        $filters = '';

        $setups = Setup::where('category','=', $name)->get();
        return view('setup.setups', compact('setups', 'categories', 'filters'));
    }

    //load single setups for setup detail page
    public function setupDetail($id){
        $setup = Setup::where('id', '=', $id)->first();

        $comments = Comment::where('setup_id', '=' , $id)->join('users', 'users.id', '=', 'comments.user_id')->orderBy('upvotes', 'desc')->get();

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
