<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Outros middlewares...
        \App\Http\Middleware\LogAccess::class, // Middleware de log de acessos
    ];
}    