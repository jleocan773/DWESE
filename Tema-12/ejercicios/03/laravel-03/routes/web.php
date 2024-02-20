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

//Definimos las rutas para que usen el controlador ClientController
//Usamos la clase ClientController
use App\Http\Controllers\ClientController;

//Vinculamos cada ruta con el método correspondiente
// Route::get("clientes", [ClientController::class, "index"]);
// Route::get("clientes/create", [ClientController::class, "create"]);
// Route::get("clientes/update/{id}", [ClientController::class, "update"]);
// Route::get("clientes/delete/{id}", [ClientController::class, "delete"]);
// Route::get("clientes/show/{id}", [ClientController::class, "show"]);

//También podemos agrupar todas las rutas de la siguiente manera
Route::controller(ClientController::class)->group(function () {
    Route::get("clientes", "index");
    Route::get("clientes/create", "create");
    Route::get("clientes/update/{id}", "update");
    Route::get("clientes/delete/{id}", "delete");
    Route::get("clientes/show/{id}", "show");
});

//Usamos la clase ProductController
use App\Http\Controllers\ProductController;
Route::resource("productos", ProductController::class);

//Usamos la clase AccountController
use App\Http\Controllers\AccountController;
Route::controller(AccountController::class)->group(function(){
    Route::get("cuentas", "index")->name("cuentas.index");
    Route::get("cuentas/create", "create")->name("cuentas.create");
    Route::get("cuentas/update/{id}", "update")->name("cuentas.update");
    Route::get("cuentas/delete/{id}", "delete")->name("cuentas.destroy");
    Route::get("cuentas/show/{id}", "show")->name("cuentas.show");
});
