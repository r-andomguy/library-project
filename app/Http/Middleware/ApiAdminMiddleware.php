<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ApiAdminMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle (Request $request, Closure $next): Response {
        if (!Auth::check() || Auth::user()->type !== 1) {
            return response()->json([
                'message' => 'Acesso negado. Apenas administradores podem acessar esta rota.'
            ], 403);
        }

        return $next($request);
    }
}
