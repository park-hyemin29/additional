<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>To do list</title>
    @vite(['resources/css/style.css'])
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
        <button class="custom-btn"><a href="/posts/completed">closed</a></button>
    </div>
    <hr>

    <form action="/posts" method="GET">
        <div class="field search-field">
            <input class="field-input" id="keyword" type="text" name="keyword" value="{{ $keyword }}" placeholder="内容で検索">
            <button type="submit" class="custom-btn">search</button>
            <!--<a class="button-link secondary-button" href="/posts">list</a>-->
        </div>
    </form>

    <hr>
    <div class="todolist_text_box">
        @forelse ($posts as $post)
            <article>
                <div class="index_title_category" style="margin-bottom: 1px;">
                    <p>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </p>
                    <p class="category_box">
                        {{ $post->category ? $post->category->name : 'categoryなし' }}
                    </p>
                </div>
                <div class="dashed_line" style="max-width:210px; margin-bottom:0px; margin-top:5px;"></div>

                <div class="todolist_text" style="margin: 0px;">
                    {{ $post->body }}
                    <div class="dotted_line"></div>
                    
                    <!--<p style="color: #b8c7eb; font-size:14px;">[sub task list]</p>-->
                    @if($post->replies->count() > 0)
                        <ul style="list-style: circle; padding-left: 10px;">
                            @foreach($post->replies as $subTask)
                                <li style="margin-bottom: 5px; color: #616161; font-size:14px;">
                                    <p style="{{ $subTask->is_completed ? 'text-decoration: line-through; color: #aaa; font-size:14px;' : '' }}">
                                        {{ $subTask->title }}
                                    </p>
                                    
                                    @if(!$subTask->is_completed)
                                        <form action="{{ route('posts.complete', $subTask->id) }}" method="POST" style="display:inline; margin-left: 5px;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="custom-btn" style="font-size: 12px; cursor: pointer;">close</button>
                                        </form>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p style="font-size: 14px; color: #aaa;">No registered sub task</p>
                    @endif

                    <form action="/posts/subtask" method="POST" style="margin-top: 15px;">
                        @csrf
                        <input type="hidden" name="parent_id" value="{{ $post->id }}">
                        <input type="hidden" name="category_id" value="{{ $post->category_id }}"> 

                        <input type="text" name="title" placeholder="add sub task" required style="padding: 4px; width: 60%;">
                        <button type="submit" class="custom-btn">add</button>
                    </form>
                </div>
                <form action="{{ route('posts.complete', $post->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="custom-btn">completed</button>
                    <div class="list_dashed_line" style="margin-bottom:20px; margin-top:20px;"></div>
                </form>
            </article>
        @empty
            <p>empty to do list</p>
        @endforelse
    </div>
    <div class="pagination-wrap">
        {{ $posts->links('pagination::simple-default') }}
    </div>
</section>    
</body>
</html>