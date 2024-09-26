<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\MoreOptionController;
use App\Http\Controllers\DashboardController;

//site
Route::get('/', [SiteController::class, 'home'])->name('home.index');
Route::get('/politica', [SiteController::class, 'politica'])->name('politica');
Route::get('/template', [SiteController::class, 'template'])->name('template');

//admim usuarios

Route::middleware('auth')->group(function () {
    // Rotas protegidas aqui
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // CRUD de Produtos
    Route::resource('produtos', ProdutoController::class);
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');       // Listagem de produtos
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');  // Formulário de criação
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');         // Salvar novo produto
    Route::get('/produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit'); // Formulário de edição
    Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');  // Atualizar produto
    Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy'); // Deletar produto

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
    Route::get('/help', [MoreOptionController::class, 'help'])->name('more_options.help');
    Route::get('/support', [MoreOptionController::class, 'support'])->name('more_options.support');
});    
    //login
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    
    
    
    
    
    
    
    
    
    
    
    
    
    