<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Response;
use View;

class CommentController extends Controller
{	


	 public function comments()
    {	
        $comments = Comment::with('user')->orderBy('created_at', 'DESC')->get();
        return view('comments.list', compact('comments'));
    }


     public function store(Request $request)
    {   
      
        $comment=new Comment;
        $comment -> post_id = $request -> input('post_id');
        $comment -> user_id = Auth::user()->id;
        $comment -> text = $request -> input('comment');
        $comment -> publish = true; 
        $comment->save();
        
        return Response::json(View::make('comment', array('comment' => $comment))->render());
    }


    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit', compact('comment'));
    }


    public function update(Request $request, $id)
    {   
        $comment = Comment::find($id);  
        if ($request -> input('publish') == 1) {
            $comment -> publish = true;   
        }
            else {
                $comment -> publish = false;
        }
        $comment->save();

        return redirect()->route('comments')->with('success', 'Comment successfully Edited!');
    }
}
