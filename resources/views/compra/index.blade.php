@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Compra - Lista</div>
                    <div class="panel-body text-center">
                        <div class="table">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Status</th>
                                    <th>Realizada em</th>
                                    <th>Atualizada em</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($compras as $compra)
                                    <tr>
                                        <td>{!! $compra->id !!}</td>
                                        <td>{!! $compra->cliente->nome !!}</td>
                                        <td>{!! $compra->pago ? 'Pago' : 'Aguardando pagamento' !!}</td>
                                        <td>{!! $compra->created_at !!}</td>
                                        <td>{!! $compra->updated_at !!}</td>
                                        <td>
                                            @cannot('administrar')
                                                <a class="btn btn-default btn-xs" href="{{ route('usuario.compras.detalhe', $compra->id) }}">Detalhes</a>
                                            @endcannot
                                            @can('administrar')
                                                <a class="btn btn-default btn-xs" href="{{ route('compra.show', $compra->id) }}">Detalhes</a>
                                                <a class="btn btn-info btn-xs" href="{{ route('compra.edit', $compra->id) }}">Editar</a>
                                                <form method="post" action="{{ route('compra.destroy', $compra->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger btn-xs" role="button" type="submit">Excluir</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-warning" role="button" onclick="history.back()">Voltar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
