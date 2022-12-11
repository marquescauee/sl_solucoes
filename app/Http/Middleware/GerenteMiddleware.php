<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Gerente;
use Illuminate\Support\Facades\Auth;

class GerenteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user() == null) {
            return redirect()->route('login');
        }

        $gerente = Gerente::where('id_gerente', Auth::user()->id)->first();

        if($gerente == null) {
            return redirect('homeGeral');
        } else {
            return $next($request);
        }
    }
}
