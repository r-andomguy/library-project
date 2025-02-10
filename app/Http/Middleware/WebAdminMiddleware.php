<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class WebAdminMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle (Request $request, Closure $next): Response {
        if(!Auth::check()){
            return redirect()->route('auth.web');
        }

        if (Auth::user()->type !== 1) {
            return redirect()->route('home')->with(
                'error',
                'Acesso negado. Apenas administradores podem acessar esta página.'
            );
        }

        return $next($request);

    }
}
