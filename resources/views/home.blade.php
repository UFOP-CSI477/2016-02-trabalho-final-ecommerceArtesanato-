@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Painel de Controle</div>
                    <div class="panel-body text-center">
                        @can('administrar')
                            <div class="btn-group">
                                <a class="btn btn-default" role="button" href="{{ route('tipoproduto.index') }}">Tipos de Produto</a>
                                <a class="btn btn-default" role="button" href="{{ route('produto.index') }}">Produtos</a>
                                <a class="btn btn-default" role="button" href="{{ route('compra.index') }}">Compras</a>
                                <a class="btn btn-default" role="button" href="{{ route('usuario.index') }}">Usuários</a>
                            </div>
                        @endcan
                        @cannot('administrar')
                            <div class="btn-group">
                                <a class="btn btn-default" role="button" href="{{ route('usuario.compras') }}">Minhas Compras</a>
                                <a class="btn btn-default" role="button" href="{{ route('usuario.ver.dados') }}">Meus Dados</a>
                            </div>
                        @endcannot
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
