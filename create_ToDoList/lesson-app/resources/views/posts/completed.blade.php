<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset="UTF-8">
    <title>To do list</title>
    @vite(['resources/css/style.css'])
</head>
<body>
<section class="box">
    <h1>Completed list</h1>
    <hr>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif    

    <div class="button-group">
        <button class="custom-btn"><a href="/">about</a></button>
        <button class="custom-btn"><a href="/posts">list</a></button>
    </div>
    <hr>

    <table class="table" style="margin-left: auto; margin-right: auto; color:gray;">
        <thead>
            <tr>
                <th>category</th>
                <th>title</th>
                <th>date</th>
                <th>manage</th> </tr>
        </thead>
        <tbody>
            @forelse($completedTodos as $post)
                <tr>
                    <td>
                        <span class="badge">{{ $post->category ? $post->category->name : 'categoryなし' }}</span>
                    </td>
                    <td>
                        <a href="/posts/{{ $post->id }}">
                            <s>{{ $post->title }}</s>
                        </a>
                    </td> 
                    <td>{{ $post->updated_at->format('Y-m-d') }}</td>
                    <td>
                        <form action="{{ route('posts.cancel', $post->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="custom-btn">cancel</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">No list of completions</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</section>    
</body>
</html>