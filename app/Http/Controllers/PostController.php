<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
     public function posts()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        return view('posts.list', compact('posts'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
    	$request->validate([
            'title'=>'required',
            'text'=>'required',
        ]);
        //create new post
        $post= new Post;
        $title=$request -> input('title');
        $post -> title = $title;
        $normalizeChars = array(
            'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'ae',
            'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
            'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'oe', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
            'Û'=>'U', 'Ü'=>'ue', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'ae',
            'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
            'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'oe', 'ø'=>'o', 'ù'=>'u',
            'ú'=>'u', 'û'=>'u', 'ü'=>'ue', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
            'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T', '?'=>'.'
        );
        $slug_tmp=strtr($title, $normalizeChars);
        $slug_tmp_break_space = str_replace(' ', '-', $slug_tmp);
        $slug_final=strtolower($slug_tmp_break_space);
        $post -> slug = $slug_final;
        $post -> text = $request -> input('text');
        $post -> user_id = Auth::user()->id;
        if ($request -> input('publish') == 1) {
            $post -> publish = true;   
        }
            else {
                $post -> publish = false;
        }
        $post->save();
        
        return redirect()->route('posts')->with('success', 'Post successfully created!');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {   
        $post = Post::find($id);
        $title=$request -> input('title');
        $post -> title = $title;
        $normalizeChars = array(
            'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'ae',
            'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
            'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'oe', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
            'Û'=>'U', 'Ü'=>'ue', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'ae',
            'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
            'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'oe', 'ø'=>'o', 'ù'=>'u',
            'ú'=>'u', 'û'=>'u', 'ü'=>'ue', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
            'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T', '?'=>'.'
        );
        $slug_tmp=strtr($title, $normalizeChars);
        $slug_tmp_break_space = str_replace(' ', '-', $slug_tmp);
        $slug_final=strtolower($slug_tmp_break_space);
        $post -> slug = $slug_final;
        $post -> text = $request -> input('text');
        $post -> user_id = Auth::user()->id;
        if ($request -> input('publish') == 1) {
            $post -> publish = true;   
        }
            else {
                $post -> publish = false;
        }
        $post->save();

        return redirect()->route('posts')->with('success', 'Post successfully created!');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$post = Post::find($id);
        $post -> delete();

        return redirect()->route('posts')->with('success', 'Post successfully removed!');
    }

     public function show(Request $request, $slug)
    {  
        $post = Post::with('user')->where('slug', '=',$slug)->first();
        $posts = Post::with('user')->orderBy('created_at', 'DESC')->get()->take(3);
        $comments = Comment::where('post_id', '=', $post->id)->where('publish', '=', true)->with('user')->orderBy('created_at', 'DESC')->get();
        $comment = null;
        return view('posts.show', compact(['post', 'posts', 'comments', 'comment']));
    }
}
