<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\SavePostRequest;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show'] ]);
    }

    public function index()
    {
        // $posts = DB::table('posts')->get();
        $posts = Post::get();

        return view('posts.index' , ['posts' => $posts]);
    }



    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }



    public function create()
    {
        return view('posts.create', ['post' => new Post]);
    }



    public function store(SavePostRequest $req)
    {
    //    $validated = $req->validate([
    //         'title'=> ['required', 'min:4'],
    //         'body'=> ['required']
    //     ],[
    //         'title.required' => 'El campo :attribute no debe estar vacio',
    //         'title.min' => 'El campo :attribute debe tener al menos 4 caracteres',
    //         'body.required' => 'El campo :attribute no debe estar vacio',
    //     ]);

        //dd($validated);
        //Post::create($validated);

        // $post = new Post;
        // $post->title = $req->input('title');
        // $post->body = $req->input('body');
        // $post->save();

       Post::create($req->validated());

        //session()->flash('status', 'Post Creado con exito!');

        return to_route('posts.index')->with('status', 'Post Created!');
    }



    public function edit(Post $post)
    {
        return view('posts.edit', ['post'=>$post]);
    }



    public function update(SavePostRequest $req, Post $post)
    {
    //    $validated = $req->validate([
    //         'title'=> ['required', 'min:4'],
    //         'body'=> ['required']
    //     ],[
    //         'title.required' => 'El campo :attribute no debe estar vacio',
    //         'title.min' => 'El campo :attribute debe tener al menos 4 caracteres',
    //         'body.required' => 'El campo :attribute no debe estar vacio',
    //     ]);

        // $post->title = $req->input('title');
        // $post->body = $req->input('body');
        // $post->save();

        $post->update($req->validated());

        //session()->flash('status', 'Post Actualizado con exito!');

        return to_route('posts.show', $post)->with('status', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index')->with('status', 'Post Deleted');
    }



}
