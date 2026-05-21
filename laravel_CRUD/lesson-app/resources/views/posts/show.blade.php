<!--
show blade는 하나의 게시글만 표시하는 영역
-->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{$post->title}}</title>
</head>
<body>
    @if (session('message'))
        <p>{{session('message')}}</p>
    @endif

    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>

    <p><a href="/posts/{{$post->id}}/edit">edit</a></p>

    <form action = "/posts/{{$post -> id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">delete this post</button>
    </form>

    <p><a href="/posts">back to list</a></p>
</body>
</html>