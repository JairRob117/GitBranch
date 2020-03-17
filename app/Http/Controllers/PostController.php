<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
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

    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function privada()
    {
        if(auth()->user()->id == 1){
            return redirect('/home');
        }
        return view('posts.vistaPrivada');
    }

    public function create()
    {
       return view('posts.create');
    }

    public function store(Request $request)
    {
        //dd(request()->all());

        $post = Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/posts');
    }

    public function edit($id)
    {
     $entrada = Post::find($id);
     

       return view('posts.edit', compact('entrada'));
    }

    public function update(Request $request, $id)
    {
          $request->validate([
            'title'=>'required',
            'body'=> 'required'
           
          ]);
    
          $post = Post::find($id);
          $post->title = $request->get('title');
          $post->body = $request->get('body');
          
          $post->save();
    
          return redirect('/posts');
    }


    public function destroy($id)
{
     $post = Post::find($id);
     $post->delete();

     return redirect('/posts');
}

}


