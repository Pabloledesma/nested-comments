<?php

Auth::loginUsingId(1);
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('posts/{post}', function (App\Post $post) {
    return view('post.show')->withPost($post);
});

Route::post('posts/{post}/comments', function (App\Post $post){

	$comment = new App\Comment(['body' => request('body')]);
	$comment->user_id = Auth::id();
	$comment->parent_id = request('parent_id', null);

	$post->comments()->save($comment);

	return back();
})->middleware('auth');
