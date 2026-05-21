<?php

namespace App\Http\Controllers;

use App\Models\Post; //c언어에서 include 개념
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        //데이터베이스의 게시글 데이터를 최신순으로 모두 가져오는 명령어
        //latest() : 작성일자를 기준으로 내림차순(최신순)으로 데이터를 정렬하는 메서드
        //get() : 정렬된 조건에 맞는 데이터를 데이터베이스로부터 실제 조회하여 가져오는 메서드
        return view('posts.index', compact('posts'));
        //변수 이름을 기반으로 변수 이름과 동일한 키를 가진 배열을 생성
        // -> 컨트롤러에서 조회한 데이터를 뷰 파일에서 사용할 수 있도록 묶어서 넘겨줄 때 사용
    }
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
        ]);

        $post = new Post();
        $post->title = $validated['title']; //입력 내용이 맞는지 확인하는 공간
        $post->body = $validated['body'];
        $post->save();

        //return redirect('/posts/create')->with('message', 'save new post');
        return redirect('/posts')->with('message', 'save new post');
    }
    
    public function show(Post $post){
        return view('posts.show', compact('post')); //상세 내용 확인용
    }

    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        /*
        update는 신규 작성이 아닌 현재 있는 데이터를 재작성하는 처리만 함
        */
        $validated = $request->validate([ //리퀘스트로 받은 값이 알맞는지 확인
            'title' => ['required', 'max:255'], //최대길이 255자 안으로 받아야 함
            'body' => ['required'], //입력이 필수라는 의미
        ]);
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->save();

        return redirect('/posts/' . $post->id)->with('message', 'update post');
    }

    public function destroy(Post $post){
        $post->delete();
        
        return redirect ('/posts')->with('message', 'delete post');
    }
}
