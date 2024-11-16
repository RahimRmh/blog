<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use carbon\carbon ;
use App\Http\Controllers\FisrtController;
use App\Http\Controllers\nameController;
use App\Http\Controllers\postscontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\commentscontroller;
use App\Mail\Discountoffer;
use App\Models\comment;
use App\Models\post;
use App\Models\project;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\table;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::resource('posts', postscontroller::class);
Route::post('posts/{post}/comments', [commentscontroller::class, 'store']);

Route::get('/message',function(){
    App::setLocale('en');
    echo(__('messages.welcome'));
   
});
Route::get('/signup/{lang}',function($lang){
    App::setlocale($lang);
    return view('signup');
});
// Route::get('/mail',function(){
//     Mail::raw('i love u',function($message){
//         $message->to('abd@example.com')->subject('talk to me please');
//     });
// });
Route::post('/mail',function(){
   $email= request()->validate([
        'email'=> 'required|email'
    ]);
    Mail::to($email)->send(new Discountoffer());
    return back();
});

Route::post('/search_post',[postscontroller::class,'search']);

   


