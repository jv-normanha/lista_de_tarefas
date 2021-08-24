<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContassController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui declaramos as rotas que serão usadas na aplicação:
|
|
*/

Route::resource('/tarefas', ContassController::class);


