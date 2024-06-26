<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Helpers\ObsceneCensorRus;
use App\Helpers\BadWordFilter;
use App\Helpers\Settings;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('comment', 'asc')->paginate(Settings::getValue("admin_items_per_page"));
        return view('pages/admin/comments/manage', compact('comments'));
    }

    public function create()
    {
        return '<h1 style="text-align:center; padding-top:100px;color:blue;">This method is empty</h1>';

        return view('pages/admin/comments/update');
    }


    public function store(Request $request)
    {
        $comment = $request->all();
        $comment['comment'] = BadWordFilter::clear($comment['comment']);
        $comment['author'] = !empty(auth()->user()->name) ? auth()->user()->name : "guest";
        Comment::create($comment);

        return redirect()->back()->with('info', 'Post has been added!'); 
    }

    public function edit(Comment $comment)
    {
        return view('pages/admin/comments/update', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->comment = $request->comment;
        $comment->update();

        return redirect()->route('comments.edit', compact('comment'))->with('info', 'Comment has been updated!'); 
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        
        return redirect()->back()->with('info', 'Запись успешно удалена'); 
    }
}
