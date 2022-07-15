<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => ['nome' => 'Fornecedor 1', 'status' => 'N'],
            1 => ['nome' => 'Fornecedor 2', 'status' => 'S'],
            2 => ['nome' => 'Fornecedor 3', 'status' => 'S'],
            3 => ['nome' => 'Fornecedor 4', 'status' => 'S'],
            4 => ['nome' => 'Fornecedor 5', 'status' => 'S'],
            5 => ['nome' => 'Fornecedor 6', 'status' => 'S'],
            6 => ['nome' => 'Fornecedor 7', 'status' => 'S'],
            7 => ['nome' => 'Fornecedor 8', 'status' => 'S'],
            8 => ['nome' => 'Fornecedor 9', 'status' => 'S'],
            9 => ['nome' => 'Fornecedor 10', 'status' => 'S'],
            10 => ['nome' => 'Fornecedor 11', 'status' => 'S'],
        ];

        // valores vazio no php
        // 0
        // '0'
        // ''
        // null
        // false
        // array()
        $teste = '';

        return view('app.fornecedor.index', compact('fornecedores', 'teste'));
    }
}
