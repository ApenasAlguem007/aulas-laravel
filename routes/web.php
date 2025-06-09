<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sobrenos', function (){
    return 'Essa é a pagina sobre nós';
});