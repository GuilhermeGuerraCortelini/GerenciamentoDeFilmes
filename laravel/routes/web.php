<?php

use App\Http\Controllers\FilmesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicial');
})->name('index');


Route::get('/filmes', [FilmesController::class,'index'])->name('filmes');

Route::get('/filmes/cadastrar', [FilmesController::class, 'cadastrar'])->name('filmes.cadastrar');

Route::post('/filmes/cadastrar', [FilmesController::class, 'gravar'])->name('filmes.gravar');

Route::get('/filmes/apagar/{filme}', [FilmesController::class, 'apagar'])->name('filmes.apagar');
Route::get('/filmes/{filme}/editar', [FilmesController::class, 'editar'])->name('filmes.editar');
Route::put('/filmes/{filme}', [FilmesController::class, 'atualizar'])->name('filmes.atualizar');

Route::get('login', [UsuariosController::class, 'login'])->name('login');

Route::post('login', [UsuariosController::class, 'login']);

Route::get('logout', [UsuariosController::class, 'logout'])->name('logout');


Route::prefix('usuarios')->group(function(){

    Route::get('/', [UsuariosController::class, 'index'])->name('usuarios');
    Route::get('cadastrar', [UsuariosController::class, 'cadastrar'])->name('usuarios.cadastrar');
    Route::post('cadastrar', [UsuariosController::class, 'gravar'])->name('usuarios.gravar');
    Route::get('editar/{usuario}', [UsuariosController::class, 'editar'])->name('usuarios.editar');
    Route::put('editar/{usuario}', [UsuariosController::class, 'editarGravar']);
    Route::get('apagar/{usuario}', [UsuariosController::class, 'apagar'])->name('usuarios.apagar');
    Route::delete('apagar/{usuario}', [UsuariosController::class, 'deletar']);
});