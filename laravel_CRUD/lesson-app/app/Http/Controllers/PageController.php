<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about(){
        return view('about');
    }    
    //Route::get('/about', [PageController::class, 'about']);から入った関数
}