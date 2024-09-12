<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\MoreOptionController;



//site

Route::get('/', [SiteController::class, 'home'])->name('home.index');
Route::get('/politica', [SiteController::class, 'politica'])->name('politica');



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

///admin vendas

Route::resource('vendas', VendaController::class);

Route::get('/vendas', [VendaController::class, 'index'])->name('vendas.index');
Route::get('/vendas/create', [VendaController::class, 'create'])->name('vendas.create');
Route::post('/vendas', [VendaController::class, 'store'])->name('vendas.store');
Route::get('/vendas/{venda}/edit', [VendaController::class, 'edit'])->name('vendas.edit');
Route::put('/vendas/{venda}', [VendaController::class, 'update'])->name('vendas.update');
Route::delete('/vendas/{venda}', [VendaController::class, 'destroy'])->name('vendas.destroy');


//admin compras


Route::resource('compras', CompraController::class);
    Route::get('/compras', [CompraController::class, 'index'])->name('compras.index');        // Lista de compras
    Route::get('/create', [CompraController::class, 'create'])->name('compras.create'); // Formulário de criação
    Route::post('/', [CompraController::class, 'store'])->name('compras.store');        // Salvar nova compra
    Route::get('/{compra}/edit', [CompraController::class, 'edit'])->name('compras.edit'); // Formulário de edição
    Route::put('/{compra}', [CompraController::class, 'update'])->name('compras.update'); // Atualizar compra
    Route::delete('/{compra}', [CompraController::class, 'destroy'])->name('compras.destroy'); // Excluir compra





    // CRUD de Relatórios

    Route::resource('relatorios', RelatorioController::class);
    Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');
    Route::get('/relatorios/create', [RelatorioController::class, 'create'])->name('relatorios.create');
    Route::post('/relatorios', [RelatorioController::class, 'store'])->name('relatorios.store');
    Route::get('/relatorios/{relatorio}/edit', [RelatorioController::class, 'edit'])->name('relatorios.edit');
    Route::put('/relatorios/{relatorio}', [RelatorioController::class, 'update'])->name('relatorios.update');
    Route::delete('/relatorios/{relatorio}', [RelatorioController::class, 'destroy'])->name('relatorios.destroy');

//mais opçoes
Route::resource('more_options', MoreOptionController::class);


Route::get('/more_options', [MoreOptionController::class, 'index'])->name('more_options.index');
Route::get('/more_options/create', [MoreOptionController::class, 'create'])->name('more_options.create');
Route::post('/more_options', [MoreOptionController::class, 'store'])->name('more_options.store');
Route::get('/more_options/{moreOption}/edit', [MoreOptionController::class, 'edit'])->name('more_options.edit');
Route::put('/more_options/{moreOption}', [MoreOptionController::class, 'update'])->name('more_options.update');
Route::delete('/more_options/{moreOption}', [MoreOptionController::class, 'destroy'])->name('more_options.destroy');

// Rotas para Ajuda e Suporte
Route::get('/help', [MoreOptionController::class, 'help'])->name('more_options.help');
Route::get('/support', [MoreOptionController::class, 'support'])->name('more_options.support');







