<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>post form</title>
</head>
<body>
    <h1>post form</h1>

    @if (session('message')) <!--만약 세션 내용이 메세지이면 그대로 메세지를 화면에 출력-->
        <p>{{session('message')}}</p>
    @endif
    
    @if ($errors->any()) <!--만약 에러가 들어오면-->
        <ul>
            @foreach($errors->all() as $error) <!--에러 전체를 번호 없는 리스트 형태로 출력-->
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    
    <form action="/posts" method="POST">
        @csrf <!--무단 전송을 방지하기 위한 표시-->

        <div>
            <label for="title">TITLE</label>
            <input id="title" type ="text" name="title" value="{{old('title')}}">
            <!--에러 발생시 기존 타이틀 값으로 롤백, 한줄 입력-->
        </div>

        <div>
            <label for="body">main post</label>
            <textarea id ="body" name="body">{{old('body')}}</textarea>
            <!-- 상동, 한줄 이상 입력 -->
        </div>

        <button type="submit">送る</button>
    </form>
</body>
</html>