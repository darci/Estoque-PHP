@extends('layout/principal')
@section('conteudo')   
    <h1>Listagem de produtos</h1>
    <table class="table table-striped table-bordered table-hover">
        @if(empty($produtos))
            <div class="alert alert-danger">Você não tem nenhum produto cadastrado.</div>
        @else
            @foreach ($produtos as $p)

            <tr class="{{ $p->quantidade <= 1 ? 'table-danger' : ''}}">
                <td>{{ $p->nome }} </td>
                <td>{{ $p->valor }} </td>
                <td>{{ $p->descricao }} </td>
                <td>{{ $p->quantidade }} </td>
                <td><a href="/produtos/mostra/{{ $p->id }}">Visualizar</a></td>
            </tr>
            @endforeach
        @endif
    </table>
    <h4>
        <div class="alert alert-danger" role="alert">
            Um ou menos itens no estoque
        </div>
    </h4>
    @if(old('nome'))
        <div class="alert alert-success">
            <strong>Sucesso!</strong>
            O produto {{ old('nome') }} foi adicionado.
        </div>
    @endif
@endsection