<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(CategoryController::class)->group(function(){
    Route::post('categories', 'store')->name('categories.store');
    Route::get('categories', 'index')->name('categories.index');
    Route::get('categories/{category}', 'show')->name('categories.show');
    Route::put('categories/{category}', 'update')->name('categories.update');
    Route::delete('categories/{category}', 'destroy')->name('categories.delete');
});

Route::controller(PostController::class)->group(function(){
    Route::post('posts', 'store')->name('posts.store');
    Route::get('posts', 'index')->name('posts.index');
    Route::get('posts/{post}', 'show')->name('posts.show');
    Route::put('posts/{post}', 'update')->name('posts.update');
    Route::delete('posts/{post}', 'destroy')->name('posts.delete');
});
