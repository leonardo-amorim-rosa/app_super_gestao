<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Para visualizar todas as rotas da aplicação
// php artisan route:list

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobrenos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@contato')->name('site.contato');
Route::get('/login', function() { return 'Login';})->name('site.login');

Route::prefix('app')->group(function() { // agrupando rotas
    Route::get('/cliente', function() { return 'Cliente';})->name('app.cliente');
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/produto', function() { return 'Produto';})->name('app.produto');    
});

// rota de fallback
Route::fallback(function() {
    echo "Rota não encontrada <a href='".route('site.index')."'>clique aqui</a> para voltar a página inicial.";
});

//redirect de rotas
Route::get('/rota1', function() { return 'rota 1';})->name('site.rota1');
Route::get('/rota2', function() { return 'rota 2';})->name('site.rota2');
Route::redirect('rota2', 'rota1'); //primeira forma, via objeto Route
Route::get('/rota3', function() { 
    return redirect()->route('site.rota1'); // segunda forma, direto via função dentro das rotas ou controllers.
})->name('site.rota3');


//passando parâmetros para controllers
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

/*
// Os parâmetros da rota podem ser opcionais, desde de que sejam passados da direita
// para a esquerda, ou se todos forem opcionais e devem incluir um valor default
Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem?}', 
    function(string $nome, string $categoria, string $assunto, $mensagem = 'Valor default') {
        return "Contato $nome - $categoria - $assunto - $mensagem";
});

// Também é possível criar rotas com validação via expressão regular
Route::get('/contato/{nome}/{categoria_id}', 
    function (string $nome, int $categoria_id) {
        return "Contato - $nome - $categoria_id";
    }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');
*/