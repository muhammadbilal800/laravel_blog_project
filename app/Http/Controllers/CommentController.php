<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function coments(Comment $comment){
        $comments = Comment::all();
     
        return view('admin.read-posts', compact('comments'));
        
        
    }
    

    public function  comment_store(Request $request,Post $post){
        $this->validate($request,[
            'content'=>'required',
        ]);     

        Comment::create([
            'content'=> $request->content,
            'user_id'=> Auth::user()->id,
            'post_id'=> $post->id,
            'comment_num'=>rand(0,999999999),
        ]);

        return back()->with('success','Comment has been posted');
    }
}

