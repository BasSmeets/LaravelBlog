<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    $posts = Post::getAllPosts();
    return view('posts', [
        'posts' => $posts
    ]);
});

/**
 * Get 1 post.
 */
Route::get('/posts/{post}', function ($postId) {
    $post = Post::find($postId);
    return view('post', [
        'header' => $post->title,
        'text' => $post->text
    ]);
})->whereNumber('post');

Route::get('/json', function () {
    return ['some' => 'json'];
});

