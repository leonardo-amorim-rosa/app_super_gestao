<?php

namespace App\Http\Middleware;

use App\LogAcesso;
use Closure;
use Facade\FlareClient\Http\Response;

class LogAcessoMiddleware
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
        //return $next($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "Requisição do Ip $ip na rota $rota"]);

        $resposta = $next($request); 
        $resposta->setStatusCode(201, 'O status code foi modificado!!!');
        return $resposta;
        
        //return $next($request);
        //return Response('Entrou no middleware e parou no mesmo.');
    }
}
