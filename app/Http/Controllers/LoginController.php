<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = $request->get('erro');
        if (isset($erro) && $erro == 1) {
            $erro = "Usuário e ou senha inválido";
        }

        if (isset($erro) && $erro == 2) {
            $erro = "Necessário realizar login para ter acesso a página";
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo Usuário (e-mail) informado está em formato inválido',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');
        echo "Usuário: $email, Senha: $password" . "<br>";

        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if (isset($usuario) && $usuario->name) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.cliente');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

    }
}
