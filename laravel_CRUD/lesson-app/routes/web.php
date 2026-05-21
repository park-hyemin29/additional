<?php

use App\Http\Controllers\PageController; //root for about
use App\Http\Controllers\PostController; //root for create post
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [PageController::class, 'about']);
//if url == about page -> check and in -> route app//
//php artisan route:list -> 
//GET|HEAD  about ......... PageController@about
Route::get('posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
//if url -> 새 문서 작성 -> 포스트 컨트롤러 클래스에 있는 create 사용
Route::post('/posts', [PostController::class, 'store']);
//송신버튼 클릭시 입력한 내용 확인 후(validate) 저장 과정으로 이동
Route::get('/posts/{post}', [PostController::class, 'show']);
//이름 그대로 보여주는 부분
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
//전체 게시글을 수정
Route::delete('/posts/{post}', [PostController::class, 'destroy']);

/*
Route::get --> 서버의 데이터를 조회하거나 페이지를 열 때 사용, 데이터가 url파라미터에 노출되어 전달
(검색 엔진 최적화(SEO), 북마크)
Route::post --> 서버에 새로운 데이터를 생성하거나 수정/삭제할 때 사용, 데이터가 http body에 담겨 전송
(대용량 데이터 전송과 보안에 유리)
Route::put --> 서버의 리소스(데이터)를 완전히 업데이트(수정)하기 위한 put http 메소드 요청을 처리하는 라우팅 문구
주로 restful api, 웹 폼에서 데이터베이스의 기존 레코드를 수정할 때 사용
(일부 수정 시 : Route::patch)
*/
