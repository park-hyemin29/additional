<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{$post->title}}</title>
    @vite('resources/css/style.css')
</head>
<body>
<section class="box">
    @if (session('message'))
        <p>{{session('message')}}</p>
    @endif

    <h1>{{$post->title}}</h1>
    <hr>
    <div class="todolist_text">
        {{$post->body}}
    </div>
    <hr>

    <div class="button-group">

    <a href="/posts/{{$post->id}}/edit" class="custom-btn">
        edit
    </a>

    <form action="/posts/{{$post->id}}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="custom-btn">
            delete
        </button>
    </form>

    <a href="/posts" class="custom-btn">
        list
    </a>

</div>
<section>    
</body>
</html>