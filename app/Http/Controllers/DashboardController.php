<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto; // Supondo que você tenha um modelo Produto

class DashboardController extends Controller
{
    public function index()
    {
        // Buscar o total de produtos
        $totalProdutos = Produto::count();
        
        // Aqui você pode adicionar outras métricas e dados que deseja exibir no dashboard

        return view('admin.dashboard', compact('totalProdutos'));
    }


    public function admin(){

        $totalProdutos = Produto::count();
        return view('admin.dashboard', compact('totalProdutos'));
        
    }
}