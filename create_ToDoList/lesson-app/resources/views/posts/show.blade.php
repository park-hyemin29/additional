<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{$post->title}}</title>
    @vite(['resources/css/style.css'])
</head>
<body>
<section class="box">
    @if (session('message'))
        <p>{{session('message')}}</p>
    @endif

    <h1>{{$post->title}}</h1>
    <hr>
    <p class="category_box">
        category : {{ $post->category ? $post->category->name : 'categoryなし' }}
    </p>
    <div class="todolist_text" style="border-radius: 12px; border: 1.5px solid #c4ccdf; max-width:200px;">
        {{$post->body}}
    </div>
    <hr>

    <div class="button-group">
        <a href="/posts" class="custom-btn">
            list
        </a>
        <a href="/posts/{{$post->id}}/edit" class="custom-btn">
            edit
        </a>
        <form action="/posts/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="custom-btn">delete</button>
        </form>
        <form action="{{ route('posts.complete', $post->id) }}" method="POST">
        <!--<form action="/posts/completed/{{$post->id}}" method="POST">-->
            @csrf
            @method('PATCH')
            <button type="submit" class="custom-btn">completed</button>
        </form>
    </div>
<section>    
</body>
</html>