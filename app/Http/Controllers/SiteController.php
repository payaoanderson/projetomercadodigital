<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
      
      return view('/home');

    }

    public function politica(){
      return view('/politica');
    }
}
