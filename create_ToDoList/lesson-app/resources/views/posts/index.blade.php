<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>To do list</title>
    @vite('resources/css/style.css')
</head>
<body>
<section class="box">
    <h1>To do list</h1>
    <hr>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif    

    <div class="button-group">
        <button class="custom-btn"><a href="/">about</a></button>
        <button class="custom-btn"><a href="/posts/create">create</a></button>
        <button class="custom-btn"><a href="/posts/completed">completed</a></button>
    </div>
    <hr>

    <div class="todolist_text_box">
        @forelse ($posts as $post)
            <article>
                <h1>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h1>
                <div class="todolist_text" style="margin-bottom: 10px;">
                    {{ $post->body }}
                </div>

                <form action="{{ route('posts.complete', $post->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="custom-btn">completed</button>
                    <div class="list_dashed_line"></div>
                </form>
            </article>
        @empty
            <p>empty to do list</p>
        @endforelse
    </div>
</section>    
</body>
</html>