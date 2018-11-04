<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class commentController extends Controller
{
    public function postComment(Request $request)
    {
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'setup_id' => $request->setup_id,
            'title' => $request->title,
            'body' => $request->body
        ]);

        return Redirect::back();
    }

    public function deleteComment(Request $request)
    {
        if (Auth::user()->is_admin == true) {
            $comment = Comment::find($request->comment_id);
            $comment->delete();

            return Redirect::back();
        } else {
            $errors = 'Cant delete this comment';
            return Redirect::back();
        }

    }

    public function commentUp(Request $request)
    {
        Comment::find($request->comment_id)->increment('upvotes');
        return Redirect::back();
    }

    public function commentDown(Request $request)
    {
        Comment::find($request->comment_id)->decrement('upvotes');
        return Redirect::back();
    }


}
