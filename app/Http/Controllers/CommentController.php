<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Helpers\ObsceneCensorRus;
use App\Helpers\BadWordFilter;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = $request->all();
        $comment['comment'] = BadWordFilter::clear($comment['comment']);
        $comment['author'] = !empty(auth()->user()->name) ? auth()->user()->name : "guest";
        Comment::create($comment);

        return redirect()->back()->with('info', 'Post has been added!'); 
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        
        return redirect()->back()->with('info', 'Запись успешно удалена'); 
    }
}
