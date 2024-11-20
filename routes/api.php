<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiProdutoController;
use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\ApiVendaController;
use App\Http\Controllers\Api\ApiCompraController;


Route::get('produtos', [ApiProdutoController::class, 'index']); // Listar produtos
Route::get('produtos/{id}', [ApiProdutoController::class, 'show']); // Detalhes de um produto
Route::post('produtos', [ApiProdutoController::class, 'store']); // Criar produto
Route::put('produtos/{id}', [ApiProdutoController::class, 'update']); // Atualizar produto
Route::delete('produtos/{id}', [ApiProdutoController::class, 'destroy']); // Deletar produto


Route::get('usuarios', [ApiUserController::class, 'index']); // Listar produtos
Route::get('usuarios/{id}', [ApiUserController::class, 'show']); // Detalhes de um produto
Route::post('usuarios', [ApiUserController::class, 'store']); // Criar produto
Route::put('usuarios/{id}', [ApiUserController::class, 'update']); // Atualizar produto
Route::delete('usuarios/{id}', [ApiUserController::class, 'destroy']); // Deletar produto



Route::get('vendas', [ApiVendaController::class, 'index']); // Listar vendas
Route::get('vendas/{id}', [ApiVendaController::class, 'show']); // Detalhes de uma venda
Route::post('vendas', [ApiVendaController::class, 'store']); // Criar uma venda
Route::put('vendas/{id}', [ApiVendaController::class, 'update']); // Atualizar uma venda
Route::delete('vendas/{id}', [ApiVendaController::class, 'destroy']); // Excluir uma venda


Route::get('compras', [ApiCompraController::class, 'index']); // Listar vendas
Route::get('compras/{id}', [ApiCompraController::class, 'show']); // Detalhes de uma venda
Route::post('compras', [ApiCompraController::class, 'store']); // Criar uma venda
Route::put('compras/{id}', [ApiCompraController::class, 'update']); // Atualizar uma venda
Route::delete('compras/{id}', [ApiCompraController::class, 'destroy']); // Excluir uma venda

