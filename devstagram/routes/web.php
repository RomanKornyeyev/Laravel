<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

/* 
Laravel usa una convención:
    GET = vista.index
    POST = vista.store (crear)
    PUT/PATCH = vista.update (actualizar)
    DELETE = vista.destroy (eliminar)
*/

Route::get('/', function () {
    return view('index');
})->name('inicio');

//generalmente los métodos que devuelven una vista se deberían llamar index
Route::get('/crear-cuenta', [RegisterController::class, "index"])->name('register');
Route::post('/crear-cuenta', [RegisterController::class, "store"]);

// ********** AUTH **********
Route::get('/muro', [PostController::class, "index"])->name('posts.index');
Route::get('/login', [LoginController::class, "index"])->name('login');
Route::post('/login', [LoginController::class, "store"]);
Route::post('/logout', [LogoutController::class, "store"])->name("logout");






























Route::get('/lista-usuarios', function(){
    // Recupera todos los usuarios de la base de datos
    $users = \App\Models\User::all();

    // Retorna la vista 'usuarios' pasando la variable $users
    return view('usuarios', ['users' => $users]);
})->name('usuarios');