<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Page d'accueil → Redirection en fonction de l'état de connexion
Route::get('/', function () {
    return Auth::check() ? redirect()->route('tasks.index') : redirect()->route('login');
});

// Authentification (Laravel UI, Breeze ou Jetstream)
Auth::routes();

// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

});

// Page après connexion
Route::get('/home', function () {
    return redirect()->route('tasks.index');
})->name('home');
