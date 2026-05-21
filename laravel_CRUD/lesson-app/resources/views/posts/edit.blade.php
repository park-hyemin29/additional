<!-- 
edit는 저장하는 처리가 아닌 편집을 화면을 출력하는 영역
-->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>edit post</title>
</head>
<body>
    <h1>edit post</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>    
            @endforeach
        </ul>
    @endif
    
    <form action="/posts/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for = "title">title</label>
            <input id ="title" type="text" name="title" value="{{old('title', $post->title)}}">
            <!-- 기존 데이터를 보여주되 입력 폼을 수정했다가 에러 발생하여 돌아온 경우 old에는 사용자가 직전에 입력했던 값 유지 -->
        </div>
        <div>
            <label for = "body">content</label>
            <textarea id = "body" name="body">{{old('body', $post -> body)}}</textarea>
        <div>

        <button type = "submit">update</button>
    </form>
    <p><a href="/post/{{$post->id}}">back to detail</a><p>
</div>
</body>
</html>