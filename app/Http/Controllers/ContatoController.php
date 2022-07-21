<?php

namespace App\Http\Controllers;

use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        //var_dump($request);
        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');
        */

        // gravando contato no banco de dados
        // forma 1
        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();
        */

        // forma 2
        // A propriedade 'fillable' no model precisa estar configurada
        /*
        $contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();
        */

        // forma 3
        //$contato = new SiteContato();
        //$contato->create($request->all());

        $motivo_contatos = [
            1 => 'Dúvida',
            2 => 'Elogio',
            3 => 'Reclamação'
        ];

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        // validando os campos do formulário
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required'
        ]);

        //SiteContato::create($request->all()); // mais uma forma de salvar um registro no banco
    }
}
