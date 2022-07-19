<?php

use App\Fornecedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criando registro utilizando a própria instância
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'RJ';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        // Utilizando o método create
        Fornecedor::create(['nome' => 'Fornecedor 200', 'site' => 'fornecedor200.com.br', 'uf' => 'SP', 'email' => 'contato@fornecedor200.com.br']);

        // Utilizando a classe DB, método insert
        DB::table('fornecedores')->insert(
            ['nome' => 'Fornecedor 300', 'site' => 'fornecedor300.com.br', 'uf' => 'RS', 'email' => 'contato@fornecedor300.com.br']
        );
    }
}
