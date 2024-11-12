<?php

use App\Http\Controllers\TailwickController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Xml\XmlController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\Pedido\PedidoController;

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

Route::get('index/{locale}', [TailwickController::class, 'lang']);


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    route::get("/", [RouteController::class, 'index'])->name('dashboard');


    // XML
    route::get('xml', [XmlController::class, 'index'])->name('xml.index');
    route::post('xmlToArray', [XmlController::class, 'xmlToArray'])->name('xml.xmlToArray');

    // Pedido
    route::post('getPedido', [PedidoController::class, 'getPedido'])->name('get.pedido');
    route::any('importaDados', [PedidoController::class, 'importaDados'])->name('importa.dados');
    route::post('atualizaDados', [PedidoController::class, 'atualizaDados'])->name('atualiza.dados');


    // User
    route::get('users', [UserController::class, 'index'])->name('user.index');
    route::post('users/create', [UserController::class, 'create'])->name('user.create');
});
