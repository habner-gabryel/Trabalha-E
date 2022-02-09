<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class ClienteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if($user !== null && $user->tipo_usuarios_id === 3){
            return $next($request);
        }
        else{
            return redirect()->back()->with("error" , "Seu usuário não tem permissão para executar esta ação.");
        }

        
    }
}
