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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/clientes', function () {
    return "Clientes";
});

Route::get('/clientes/new', function () {
    return "New Cliente";
});

Route::get('/clientes/delete', function () {
    return "Vista Eliminar Cliente";
});

// //Para poder poner una ruta con parámetros se debe usar la siguiente sintaxis
// Route::get('/clientes/delete/{id}', function ($id) {
//     return "Se ha eliminado al cliente: " . $id; 
// });

//Para poder poner una ruta con parámetros se debe usar la siguiente sintaxis
Route::get('/clientes/edit/{id}', function ($id) {
    return "Se va a editar al cliente: " . $id;
});

//Para poder poner una ruta con parámetros se debe usar la siguiente sintaxis
Route::get('/clientes/show/{id}', function ($id) {
    return "Se va a mostrar al cliente: " . $id;
});

//Además, Laravel permite generar rutas con parámetros opcionales
Route::get('/clientes/delete/{id1}/{id2?}', function ($id1, $id2 = null) {
    if (!$id2) {
        return "Eliminar al cliente: " . $id1;
    } else {
        return "Eliminar de los clientes: " . $id1 . " hasta el " . $id2;
    }
});
