<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Ruta para Home
//Importamos el controlador Home
use App\Http\Controllers\HomeController;

//Ponemos la ruta para home
Route::get('/', HomeController::class);
//Ruta para Students
//Importamos el controlador Student
use App\Http\Controllers\StudentController;

//Ponemos la ruta para students
Route::resource('alumnos', StudentController::class);