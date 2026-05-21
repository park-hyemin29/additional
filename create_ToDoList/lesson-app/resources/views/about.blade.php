<!DOCTYPE html>
<html lang="ja">
<head>
        <meta charset="UTF-8">
        <title>To do list</title>
        @vite('resources/css/style.css')
</head>
<body>
    <section class="box">
        <h1>TO DO LISTの説明</h1>
        <hr>
        <p>練習中なので簡単な機能だけ実装されています。</p>
        <p>今、使える機能は下に書いている通りです。
        </p>
        <hr>
        <ul>
            <li><a href="/posts/create">create</a><li>
            <li><a href="/posts">read</a></li>
            <li><a href="/posts">update</a></li>
            <li><a href="/posts">delete</a></li>
        </ul>
        <hr>
        <br>
        <div class = "to_be_added_later">
        <p>順番に追加する予定の機能</p>
        <hr>
            <ol>
                <li><s>日付フィールドには数字のみ入力可能（8個の数字のみ許可）</s></li>
                <li>終了時にチェックして終了フォームを別にして移動</li>
                <li>日付確認後、その日にリストを上に移動</li>
                <li>アップデート時に変更がなければ案内する機能</li>
            </ol>
        </div>
    </section>
</body>
</html>            
            