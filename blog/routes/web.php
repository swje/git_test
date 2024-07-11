<?php

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
    return view('welcome');
});

Route::get('/blog', [\App\Http\Controllers\BlogPostController::class, "index"]);
Route::get('/blog/list', [\App\Http\Controllers\BlogPostController::class, "index"]);
Route::get('/blog/create', [\App\Http\Controllers\BlogPostController::class, "create"]);
Route::post('/blog/create', [\App\Http\Controllers\BlogPostController::class, "store"]);
Route::get('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, "show"]);
Route::get('/blog/edit/{blog_post_id}', [\App\Http\Controllers\BlogPostController::class, "edit"]);
Route::post('/blog/edit/{blogPost}', [\App\Http\Controllers\BlogPostController::class, "update"]);
Route::get('/blog/delete/{blogPost}', [\App\Http\Controllers\BlogPostController::class, "destroy"]);
Route::post('/blog/delete/{blog_post_id}', [\App\Http\Controllers\BlogPostController::class, "delete"]);
# Comment
Route::post('/comment', [\App\Http\Controllers\CommentController::class, "store"]);
# Auth
Route::get('/auth/regist', [\App\Http\Controllers\AuthController::class, "create"]);
Route::post('/auth/regist', [\App\Http\Controllers\AuthController::class, "store"]);
Route::get('/auth/login', [\App\Http\Controllers\AuthController::class, "login"]);
Route::post('/auth/login', [\App\Http\Controllers\AuthController::class, "login_store"]);
Route::get('/auth/logout', [\App\Http\Controllers\AuthController::class, "logout"]);

