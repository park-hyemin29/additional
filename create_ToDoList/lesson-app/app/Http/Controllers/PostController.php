<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('keyword');

        $posts = Post::with(['category', 'replies'])
                    ->where('is_completed', false)
                    ->whereNull('parent_id')
                    ->when($keyword, function ($query, $keyword) {
                        $query->where('body', 'like', '%' . $keyword . '%');
                    })
                    ->latest()
                    ->paginate(3);

        return view('posts.index', compact('posts', 'keyword'));
    }

    public function storeSubTask(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'parent_id' => ['required', 'exists:posts,id'], 
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->body = $validated['title'];
        $post->parent_id = $validated['parent_id'];   
        $post->category_id = $validated['category_id']; 
        $post->save();

        return redirect()->route('posts.index')->with('message', 'save sub task');
    }

    public function complete(Post $post)
    {
        $post->update(['is_completed' => true]);
        return redirect()->route('posts.completed')->with('success', 'completed');
    }

    public function completed()
    {
        $completedTodos = Post::with('category')
                          ->where('is_completed', true)
                          ->latest()
                          ->get();

        return view('posts.completed', compact('completedTodos'));
    }

    public function cancel(Post $post)
    {
        $post->update(['is_completed' => false]);
        return redirect()->route('posts.index')->with('message', 'return to list');
    }

    public function create(){
        $categories = \App\Models\Category::all(); 
        return view('posts.create', compact('categories'));
        //return view('posts.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->category_id = $validated['category_id'];
        $post->save();

        return redirect('/posts')->with('message', 'save new list');
    }
    
    public function show(Post $post){
        $post->load('category');
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post){
        $categories = \App\Models\Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post){
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'], 
            'category_id' => ['required', 'exists:categories,id'],
        ]);
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->category_id = $validated['category_id'];
        $post->save();

        return redirect('/posts/' . $post->id)->with('message', 'update list');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect ('/posts')->with('message', 'delete list');
    }
}
