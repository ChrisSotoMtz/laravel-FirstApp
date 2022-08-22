<?php

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {


    return view('posts',[
        'posts' => Post::all()
    ]);
});

/* Componente para rutas de blogs */
Route::get('posts/{post}', function($slug) {
$post = Post::find($slug);


    return view('post',[
        'post' => Post ::find($slug)
    ]);
})-> where('post','[A-z_\-]+');


