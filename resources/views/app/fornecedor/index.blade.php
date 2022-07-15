<h1>Fornecedores</h1>

@php
    // Bloco PHP padrão dentro do Blade
    echo 'Teste de texto';

    $clientes = '';
    $clientes = [];
@endphp

<br>
{{-- Comentário Blade --}}

Teste de escape no blade @{{ $teste }}
<br>

<!-- for simples no blade -->
@for ($i = 0; $i < 10; $i++)
    Teste de for {{ $i }} <br>
@endfor

<!-- foreach no blade -->
@foreach ($fornecedores as $index => $fornecedor)
    {{--@dd($loop) varável loop, disponivel no foreach e forelse e diretiva @dd usada para mostrar tudo sobre uma variável--}}
    Fornecedor {{ $index }} - {{ $fornecedor['nome'] }} - {{ $fornecedor['status'] }} <br>
@endforeach
<br>

<!-- forelse no blade -->
@forelse($clientes as $index => $cliente)
    Fornecedor(forelse) {{ $index }} - {{ $cliente['nome'] }} <br>
@empty
    Sem clientes cadastrados
@endforelse
<br>

{{ 'Teste de texto' }}
<?= 'Teste de texto' ?>
<br>


@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    Existem fornecedores
@elseif(count($fornecedores) > 0 && count($fornecedores) > 10)
    Existem muitos forncedores
@else
    Não existem forncedores        
@endif

<br>
@unless(count($fornecedores) > 11) {{-- condição de negação --}}
    Fornecedores ainda não bateu a meta de 11
@endunless

<br>
@isset($clientes) {{-- verifica se existe a variável $clientes --}}
    Clientes a vista
@endisset

<br>
@empty($teste)
    A variável $teste está  vazia
@endempty