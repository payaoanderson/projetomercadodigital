<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiProdutoController;
use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\ApiVendaController;
use App\Http\Controllers\Api\ApiCompraController;

Route::get('api/produtos/index', [ApiProdutoController::class, 'index']);
Route::get('api/produtos/{id}', [ApiProdutoController::class, 'show']);
Route::post('api/produtos', [ApiProdutoController::class, 'store']);
Route::put('api/produtos/{id}', [ApiProdutoController::class, 'update']);
Route::delete('api/produtos/{id}', [ApiProdutoController::class, 'destroy']);


Route::get('usuarios', [ApiUserController::class, 'index'])->name('usuarios.index'); // Listar usuários
Route::get('usuarios/{id}', [ApiUserController::class, 'show'])->name('usuarios.show'); // Detalhes de um usuário
Route::post('usuarios', [ApiUserController::class, 'store'])->name('usuarios.store'); // Criar usuário
Route::put('usuarios/{id}', [ApiUserController::class, 'update'])->name('usuarios.update'); // Atualizar usuário
Route::delete('usuarios/{id}', [ApiUserController::class, 'destroy'])->name('usuarios.destroy'); // Deletar usuário

Route::get('vendas', [ApiVendaController::class, 'index'])->name('vendas.index'); // Listar vendas
Route::get('vendas/{id}', [ApiVendaController::class, 'show'])->name('vendas.show'); // Detalhes de uma venda
Route::post('vendas', [ApiVendaController::class, 'store'])->name('vendas.store'); // Criar uma venda
Route::put('vendas/{id}', [ApiVendaController::class, 'update'])->name('vendas.update'); // Atualizar uma venda
Route::delete('vendas/{id}', [ApiVendaController::class, 'destroy'])->name('vendas.destroy'); // Excluir uma venda

Route::get('compras', [ApiCompraController::class, 'index'])->name('compras.index'); // Listar compras
Route::get('compras/{id}', [ApiCompraController::class, 'show'])->name('compras.show'); // Detalhes de uma compra
Route::post('compras', [ApiCompraController::class, 'store'])->name('compras.store'); // Criar uma compra
Route::put('compras/{id}', [ApiCompraController::class, 'update'])->name('compras.update'); // Atualizar uma compra
Route::delete('compras/{id}', [ApiCompraController::class, 'destroy'])->name('compras.destroy'); // Excluir uma compra
