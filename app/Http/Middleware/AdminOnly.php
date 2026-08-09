<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check() || auth()->user()->role !== UserRole::Admin) {
            abort(403, 'Acesso negado. Apenas administradores podem acessar esta página.');
        }

        return $next($request);
    }
}
