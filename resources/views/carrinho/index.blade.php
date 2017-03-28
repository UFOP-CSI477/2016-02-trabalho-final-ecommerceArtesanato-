@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Carrinho de compras</div>
                    <div class="panel-body">
                        <div class="table">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Preço</th>
                                    <th>Quantidade</th>
                                    <th>Cor</th>
                                    <th>Bordado</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carrinho as $item)
                                    <tr>
                                        <td>{!! $item->produto->nome !!}</td>
                                        <td>{!! $item->produto->preco !!}</td>
                                        <td>{!! $item->quantidade !!}</td>
                                        <td>{!! $item->cor !!}</td>
                                        <td>{!! $item->bordado !!}</td>
                                        <td><a class="btn btn-danger btn-xs" role="button" href="{{ route('carrinho.remover', array_search($item, $carrinho)) }}">Remover</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        <a class="btn btn-default" role="button" href="{{ route('carrinho.limpar') }}">Limpar carrinho</a>
                        <a class="btn btn-info" role="button" href="{{ route('carrinho.finalizar') }}">Finalizar compra</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
