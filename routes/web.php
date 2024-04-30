<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserController;


Route::get('', [PostsController::class,'index'])->name('index');
Route::get('/About', function () { return view('./Pages/About'); })->name('about');
Route::get('/posts/{id}', [PostsController::class,'show'])->name('posts.show');
// Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');


Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class,'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class,'register']);
    Route::get('/login', [AuthController::class,'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class,'login']);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/Users', [AdminUserController::class, 'index'])->name('users');
    Route::get('/All Posts', [PostsController::class, 'posts'])->name('all.posts');
    Route::delete('/All Posts/{id}', [PostsController::class, 'destrotyByadmin'])->name('delete.posts');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::put('/users/{user}/password', [AdminUserController::class, 'changePassword'])->name('users.password');
    Route::get('/Dashbord',[UserController::class, 'index'] )->name('dashbord');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [UserController::class, 'changePassword'])->name('profile.password');
    Route::delete('/profile', [UserController::class, 'destroyProfile'])->name('profile.destroy');
    Route::get('/posts', [UserController::class, 'posts'])->name('posts');
    Route::get('/posts/{post}/edit', [UserController::class, 'editPost'])->name('posts.edit');
    Route::get('/New Post', [PostsController::class, 'create'])->name('post.create');
    Route::post('/New Post', [PostsController::class, 'store'])->name('post.store');
    Route::put('/posts/{post}', [PostsController::class, 'update'])->name('post.update');
    Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
});

