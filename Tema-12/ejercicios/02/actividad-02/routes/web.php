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

//Ruta para /test de forma que cuando se acceda a dicha URL se muestre vuestro nombre, módulo, curso y la palabra Prueba.
Route::get('/test', function () {
    return "Jonathan León Canto - DWESE - 2ºDAW - Prueba";
});

//Ruta para /api/user de forma que cuando se acceda a dicha URL muestre una cita relacionada con la informática.
Route::get('/api/user', function () {
    return "La programación es como un libro de recetas. A menudo, los ingredientes son mejores que el resultado final.";
});

// //Ruta para user/nombre/apellidos de forma que cuando se acceda a dicha URL se muestre tu nombre completo, por lo tanto nombre y apellidos han de ser definidos como parámetros
// Route::get('/user/{nombre}/{apellidos}', function ($nombre, $apellidos) {
//     return"$nombre $apellidos";
// });

// //Crear la ruta user/view/id, donde id es un parámetro opcional y mostrará en pantalla view: id (del usuairo)
// Route::get('/user/view/{id?}', function ($id=null) {
//     return "view: $id";
// });

//Ruta que permita pasar 2 parámetros donde el segundo es opcional. Mostrar mensaje relacionado con la ruta
Route::get('/user/{nombre}/{apellidos?}', function ($nombre, $apellidos=null) {
    if($apellidos==null){
        return "Hola $nombre";
    }else{
        return "Hola $nombre $apellidos";
    }
});