<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (): void {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::get('/livros', [LivroController::class, 'index']);
    Route::get('/livros/{id}', [LivroController::class, 'show']);
    Route::get('/autores', [AutorController::class, 'index']);
    Route::get('/autores/{id}', [AutorController::class, 'show']);

    Route::middleware('role:leitor')->group(function (): void {
        Route::get('/reservas/minhas', [ReservaController::class, 'minhas']);
        Route::post('/reservas', [ReservaController::class, 'store']);
    });

    Route::middleware('role:admin')->group(function (): void {
        Route::post('/autores', [AutorController::class, 'store']);
        Route::put('/autores/{id}', [AutorController::class, 'update']);
        Route::patch('/autores/{id}', [AutorController::class, 'update']);
        Route::delete('/autores/{id}', [AutorController::class, 'destroy']);

        Route::post('/livros', [LivroController::class, 'store']);
        Route::put('/livros/{id}', [LivroController::class, 'update']);
        Route::patch('/livros/{id}', [LivroController::class, 'update']);
        Route::delete('/livros/{id}', [LivroController::class, 'destroy']);

        Route::get('/reservas', [ReservaController::class, 'index']);
        Route::patch('/reservas/{id}', [ReservaController::class, 'updateEstado']);
    });
});
