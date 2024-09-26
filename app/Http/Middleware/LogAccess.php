<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\AccessLog;

class LogAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Registra o IP do usuário
        AccessLog::create([
            'ip_address' => $request->ip(),
        ]);

        return $next($request);
    }
}