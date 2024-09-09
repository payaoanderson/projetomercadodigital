<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompraController;


//site

Route::get('/index', [SiteController::class, 'index'])->name('home.index');



//admim usuarios

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');







// Rotas protegidas por autenticação
//Route::middleware(['auth'])->group(function () {

    // Página inicial da área administrativa
    Route::get('/admin', [ProdutoController::class, 'dashboard'])->name('admin.dashboard');
    // CRUD de Produtos
    Route::resource('produtos', ProdutoController::class);

    // Rotas manuais para produtos (se preferir rotas explícitas ao invés de resource)
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');       // Listagem de produtos
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');  // Formulário de criação
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');         // Salvar novo produto
    Route::get('/produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit'); // Formulário de edição
    Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');  // Atualizar produto
    Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy'); // Deletar produto
//});

///admin compras



Route::get('/compras', [CompraController::class, 'index'])->name('compras.index');       // Listar todas as compras
Route::get('/compras/create', [CompraController::class, 'create'])->name('compras.create');  // Formulário para criar nova compra
Route::post('/compras', [CompraController::class, 'store'])->name('compras.store');         // Salvar nova compra
Route::get('/compras/{compra}/edit', [CompraController::class, 'edit'])->name('compras.edit'); // Formulário para editar compra
Route::put('/compras/{compra}', [CompraController::class, 'update'])->name('compras.update');  // Atualizar compra existente
Route::delete('/compras/{compra}', [CompraController::class, 'destroy'])->name('compras.destroy'); // Excluir compra existente






