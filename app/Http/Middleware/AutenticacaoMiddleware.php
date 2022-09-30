<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao)
    {
        session_start();
        if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
            return $next($request);
        } else {
            return redirect()->route('site.login', ['erro' => 2]);
        }

        // if ($metodo_autenticacao == "padrao")
        // {
        //     echo "Verifique o usuário e senha no banco de dados.";
        // }

        // // return $next($request);
        // return Response('Acesso a rota negado!');
    }
}
