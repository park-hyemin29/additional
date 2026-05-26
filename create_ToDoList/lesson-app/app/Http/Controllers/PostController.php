<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /*
    public function index(){
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }
    */    
    public function index()
    {
        $posts = Post::where('is_completed', false)->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function complete(Post $post)
    {
        $post->update(['is_completed' => true]);
        return redirect()->route('posts.completed')->with('success', 'completed');
    }

    public function completed()
    {
        $completedTodos = Post::where('is_completed', true)->latest()->get();
        return view('posts.completed', compact('completedTodos'));
    }

    public function cancel(Post $post)
    {
        $post->update(['is_completed' => false]);
        return redirect()->route('posts.index')->with('message', 'return to list');
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->save();

        return redirect('/posts')->with('message', 'save new list');
    }
    
    public function show(Post $post){
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'], 
        ]);
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->save();

        return redirect('/posts/' . $post->id)->with('message', 'update list');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect ('/posts')->with('message', 'delete list');
    }
}
