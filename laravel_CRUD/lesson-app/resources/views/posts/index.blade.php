<!--
index blade는 게시글 목록을 표시하는 영역
-->

<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset="UTF-8">
    <title>post list</title>
</head>
<body>
    <h1>post list</h1>

    @if (session('message'))
        <p>{{session('message')}}</p>
    @endif    

    <p><a href="/posts/create">create new post</a></p>
    <!-- url 링크 입력시 <a href=~~~ > <a> -->

    @forelse ($posts as $post)
        <article> <!--데이터베이스의 게시글 모델을 화면에 정의-->
            <h2>
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h2>
            <p><{{$post->body}}</p>
        </article> <!--공란이 아닐시 리스트 값을 반복해서 출력-->
        <hr>
    @empty
        <p>empty post list</p>
    @endforelse
</body>
</html>