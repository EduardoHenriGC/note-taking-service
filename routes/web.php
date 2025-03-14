<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckIfIsAdmin;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TagController;
use App\Http\Controllers\NoteTagController;


Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
Route::get('/tags/{tagId}/notes', [NoteTagController::class, 'index'])->name('tags.notes');
Route::delete('/tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');

Route::get('/notes/{noteId}/add-tag', [NoteTagController::class, 'addTagForm'])->name('notes.addTagForm');
Route::post('/notes/{noteId}/add-tag', [NoteTagController::class, 'addTagToNote'])->name('notes.addTagToNote');
Route::delete('/tags/{tagId}/notes/{noteId}', [NoteTagController::class, 'removeTagFromNote'])->name('tags.notes.remove');




Route::get('/produtos', [ProductController::class, 'index'])->name('produtos.index');
Route::get('/produtos/{id}/editar', [ProductController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/{id}', [ProductController::class, 'update'])->name('produtos.update');// Exibe o formulário para criar um novo produto
Route::get('/produtos/criar', [ProductController::class, 'create'])->name('produtos.create');
Route::post('/produtos', [ProductController::class, 'store'])->name('produtos.store');
Route::delete('/produtos/{id}', [ProductController::class, 'destroy'])->name('produtos.destroy');



Route::middleware('auth')
    ->prefix('admin')
    ->group(function () {
        // Route::resource('/users', UserController::class);
        Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy')->middleware(CheckIfIsAdmin::class);
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
    });

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
   
});

require __DIR__ . '/auth.php';
