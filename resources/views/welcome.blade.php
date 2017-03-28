@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($produtos as $produto)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail text-center">
                            <img class="img-thumbnail" width="180px" height="180px" src="{{ asset('storage/imagens/produtos/' . last(explode('/', $produto->caminho_imagem))) }}" alt="{!! $produto->nome !!}">
                            <div class="caption">
                                <h3>{!! $produto->nome !!}</h3>
                                <p>{!! $produto->tipo->nome !!}</p>
                                <p>R${{ $produto->preco }}</p>

                                <form class="form-horizontal" action="{{ route('carrinho.adicionar') }}" method="post" accept-charset="UTF-8">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $produto->id }}" name="produto">

                                    <div class="form-group">
                                        <label for="quantidade{{ $produto->id }}">Quantidade</label>
                                        <input id=quantidade{{ $produto->id }}" name="quantidade" min="1" type="number" class="form-control" title="Quantidade do item" placeholder="Quantidade do item" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="cor{{ $produto->id }}">Cor</label>
                                        <input id="cor{{ $produto->id }}" name="cor" type="color" class="form-control" placeholder="Cor do bordado" title="Cor do bordado" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="bordado{{ $produto->id }}">Bordado</label>
                                        <input id="bordado{{ $produto->id }}" name="bordado" type="text" class="form-control" maxlength="255" placeholder="O que deve ser bordado" title="O que deve ser bordado" required>
                                    </div>

                                    <br>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info">Adicionar no carrinho</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
