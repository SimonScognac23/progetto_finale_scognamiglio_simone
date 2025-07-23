<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;  // <- AGGIUNGI QUESTA RIGA


 Route::get('/', function () {
     return view('welcome');
 });


Route::get('/', [PublicController::class, 'homepage'])->name('homepage');


Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');
