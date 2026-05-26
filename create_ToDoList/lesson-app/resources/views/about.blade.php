<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>To do list</title>
    @vite('resources/css/style.css')
</head>
<body>
    <section class="box">
        <h1>TO DO LIST</h1>
        <hr>
        <div class = nav_button_box>
            <ul class="nav-menu">
                <li><a href="/posts/create">リストを作る</a></li>
                <li><a href="/posts">リストの確認</a></li>
                <li><a href="/posts/completed">期限切れリスト</a></li>
            </ul>
        </div>
        <br>
        <div class = "to_be_added_later">
        <p>追加する予定の機能</p>
        <hr>
            <ul>
                <li>create
                    <div class="dotted_line"></div>
                    <ul>
                        <li><s>日付フィールドには数字のみ入力可能（8個の数字のみ許可）</s></li>
                    </ul>
                </li>   
                <div class="dashed_line"></div>
                <li>index
                    <div class="dotted_line"></div>
                    <ul>
                        <li>全削除ボタンを追加</li>
                        <li>日付確認後、その日にリストを上に移動</li>
                    </ul>
                </li>    
                <div class="dashed_line"></div>
                <li>update
                    <div class="dotted_line"></div>
                    <ul>
                        <li>アップデート時に変更がなければ案内する機能</li>
                    </ul>
                </li> 
                <div class="dashed_line"></div>
                <li>completed
                    <div class="dotted_line"></div>
                    <ul>
                        <li><s>終了時にチェックして終了フォームを別にして移動</s></li>
                        <li><s>期限切れのタイトルをクリックすると、該当内容を確認できるようにする<s></li>
                        <li><s>rollback機能を追加</s></li>
                    </ul>
                </li>   
            </ul>
        </div>
    </section>
</body>
</html>            
            