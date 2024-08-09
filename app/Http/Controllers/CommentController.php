<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\trisster;

class CommentController extends Controller
{
    public function store(trisster $trisster){
        $comment = new Comment();
        $comment->trisster_id = $trisster->id;
        $comment->user_id = auth()->id();
        $comment->content= request()->get('content');
        $comment->save();

        return redirect()->route('trisster.show', $trisster->id)->with('success', 'Comment posted!');


    }
}
