<?php

namespace App\Http\Controllers;

use App\SiteContato;
use App\MotivoContato;
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

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        // validando os campos do formulário
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedbacks = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome não pode ter mais que 40 caracters',
            'email.email' => 'O email informado não é válido',
            'mensagem.max' => 'O campo mensagem não pode ter mais do que 2000 caracters.',
            'required' => 'O campo :attribute é de preenchimento obrigatório.'
        ];

        $request->validate($regras, $feedbacks);

        SiteContato::create($request->all()); // mais uma forma de salvar um registro no banco
        return redirect()->route('site.index');
    }
}
