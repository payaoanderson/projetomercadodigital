<?php
namespace App\Http\Controllers;

use App\Models\MoreOption;
use Illuminate\Http\Request;

class MoreOptionController extends Controller
{
  
    // Métodos para Ajuda e Suporte
    public function help()
    {
        return view('admin.more_options.help');
    }

    public function support()
    {
        return view('admin.more_options.support');
    }
}