<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
       $posts=Post::with(['likes' => function($q) {
            $q->where('user_id', '=', Auth::user()->id); 
        }])
        ->where('publish', '=', true)
        ->orderBy('created_at', 'DESC')
        ->get();
        $likes=Like::get();
        return view('home')->with('posts', $posts)->with('likes', $likes);;
    }

    public function adminHome()
    {
        return view('adminHome');
    }


    public function like(Request $request)
    {   

        $existingLike=Like::where('post_id', '=', $request->post_id)->where('user_id', '=', Auth::user()->id)->first();
        if($existingLike == null){
            $like= new Like;
            $like-> post_id = $request->input('post_id');
            $like-> user_id = Auth::user()->id;
            $like-> liked = $request->boolean('liked');
            $like->save();
            $numberOfPostLikes=$this->getNumberofLikes($request->post_id);
            return response()->json(['data' => $like, 'numberOfPostLikes' => $numberOfPostLikes]);
        }else{
            $existingLike-> liked = $request->boolean('liked');
            $existingLike->save();
            $numberOfPostLikes=$this->getNumberofLikes($request->post_id);
            return response()->json(['data' => $existingLike, 'numberOfPostLikes' => $numberOfPostLikes]);
        }
    }

    private function getNumberofLikes($post_id)
    {
        $post=Post::where('id', '=', $post_id)->first();
        return $post->getTotalLikesAttribute();
    }
}
