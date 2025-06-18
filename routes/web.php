<?php

use App\Http\Controllers\ContatosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Rota de contato. O  name('contatos.index'); batiza o nome de uma rota.. é obrigatório.

Route::get ('/contatos', [ContatosController::class, 'index']) -> name('contatos.index');

// ROTA DELETE 

Route::delete('/contatos/{contatosID}', [ContatosController::class, 'delete']) -> name('contatos.delete');

//  Rota de Create  - método GET

Route::get('/contatos/create', [ContatosController::class, 'create']) -> name('contatos.create.get');

// Rota Create - Método POST 

Route::post('/contatos/create', [ContatosController::class, 'create']) -> name('contatos.create.post');


Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', function(){
    return view('index');

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
