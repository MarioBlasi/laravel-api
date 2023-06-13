<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/create', [PageController::class, 'create']);
    Route::get('/', [PageController::class, 'index'])->name('dashboard');
    Route::resource('posts',PageController::class)->parameters(['posts' => 'post:slug']);
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/admin/create', function () {
    return view('admin.posts.create');
})->name('admin.posts.create');


Route::get('/admin/dashboard', function () {
    return view('admin.posts.dashboard');
})->name('admin.posts.dashboard');

Route::get('/admin/edit', function () {
    return view('admin.posts.edit');
})->name('admin.posts.edit');

Route::get('/admin/index', function () {
    return view('admin.posts.index');
})->name('admin.posts.index');

Route::get('/admin/show', function () {
    return view('admin.posts.show');
})->name('admin.posts.show');



require __DIR__.'/auth.php';