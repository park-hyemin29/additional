<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>create to do list</title>
    @vite(['resources/css/style.css'])
</head>
<body>
<section class="box">
    <h1>Make a to do list</h1>
    <hr>
    @if (session('message'))
        <p>{{session('message')}}</p>
    @endif
    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    
    <form id = "form_id" action="/posts" method="POST">
        @csrf 

        <div>
            <label for="category_id">category</label>
            <select name="category_id" id="category_id" required>
                <option value="">-- select category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <br>
            <label for="title">date</label>
            <input id="title" required
                name="title" value="{{old('title')}}">
        </div>

        <div>
            <label for="body">to do list</label>
            <textarea id ="body" name="body">{{old('body')}}</textarea>
        </div>

        <hr>
    </form>

    <div class="button-group">
        <button class="custom-btn"><a href="/posts">list</a></button>
        <button type="submit" class="custom-btn" form="form_id">submit</button>
    </div>
</section>    
</body>
</html>