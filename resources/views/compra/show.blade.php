@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Compra - Detalhes</div>
                    <div class="panel-body text-center">
                        <h4>Itens comprados por {!! $compra->cliente->nome !!} em {!! $compra->created_at !!}</h4>
                        <div class="table">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Preço</th>
                                    <th>Quantidade</th>
                                    <th>Cor</th>
                                    <th>Bordado</th>
                                    @can('administrar')
                                        <th>Ações</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @php $total = 0; @endphp
                                @foreach($compra->transacoes as $transacao)
                                    <tr>
                                        <td>{!! $transacao->produto->nome !!}</td>
                                        <td>{!! $transacao->produto->preco !!}</td>
                                        <td>{!! $transacao->quantidade !!}</td>
                                        <td>{!! $transacao->cor !!}</td>
                                        <td>{!! $transacao->bordado !!}</td>
                                        @can('administrar')
                                            <td>
                                                <a class="btn btn-info btn-xs" href="{{ route('transacao.edit', $transacao->id) }}">Editar</a>
                                                <form method="post" action="{{ route('transacao.destroy', $transacao->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger btn-xs" role="button" type="submit">Excluir</button>
                                                </form>
                                            </td>
                                        @endcan
                                    </tr>
                                    @php $total += $transacao->produto->preco @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-center">Total: R${{ $total }}</h4>
                        <div class="text-center">
                            <button class="btn btn-warning" role="button" onclick="history.back()">Voltar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
