<?php

namespace App\Http\Controllers;

use Comment;
use Illuminate\Http\Request;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class CommentsController extends Controller
{
    public function postCreateComment(Request $request){
        // Validation
        $this->validate($request,[
            'body' => 'required|max:1000'
        ]);
        $comment = new Comment();
        $comment->body = $request['body'];
        $message = 'Het is niet gelukt om de reactie op te slaan';
        if($request->user()->posts()->save($comment)) {
            $message = 'Reactie succesvol geplaatst';
        }
        return redirect()->route('news')->with(['message' => $message]);
    }
}