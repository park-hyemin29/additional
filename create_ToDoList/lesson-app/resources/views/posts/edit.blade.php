<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>edit to do list</title>
    @vite('resources/css/style.css')
</head>
<body>
<section class="box">
    <h1>edit to do list</h1>
    <hr>
    <button class="custom-btn"><a href="/posts">list</a></button>
    <hr>

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
            <label for = "title">date</label>
            <input id="title" 
                type ="number" 
                maxlength="8"
                pattern="[0-9]{8}"
                required
                name="title" value="{{old('title')}}">
        </div>

        <div>
            <label for = "body">to do list</label>
            <textarea id = "body" name="body">{{old('body', $post -> body)}}</textarea>
        <div>

        <button class="custom-btn"; type = "submit">update</button>
    </form>
</div>
</section>
</body>
</html>