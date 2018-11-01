<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commentController extends Controller
{
    public function postComment(Request $request){
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'setup_id' => $request->setup_id,
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('/setup/' . $request->setup_id );
    }
}
