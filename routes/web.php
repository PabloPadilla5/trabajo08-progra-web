<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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

Route::get('/', [PostController::class, 'index'])
    ->name('home');

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');

Route::get('category/{category}', [PostController::class, 'category'])
    ->name('posts.category');

Route::get('tag/{tag}', [PostController::class, 'tag'])
    ->name('posts.tag');

Route::get('/my-posts', [PostController::class, 'myposts'])
    ->name('posts.my-posts');

Route::group(['middleware' => 'auth' ], function() {
    Route::get('/create', [PostController::class, 'create'])
        ->name('posts.create');
});

Route::post('/upload-blog', [PostController::class, 'store'])
    ->name('posts.upload-blog');