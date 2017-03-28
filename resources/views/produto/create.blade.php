@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Produto - Criar</div>
                    <div class="panel-body text-center">
                        <form accept-charset="UTF-8" action="{{ route('produto.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                    <label for="nome" class="col-md-4 control-label">Nome</label>

                                    <div class="col-md-6">
                                        <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" required autofocus>
                                        @if ($errors->has('nome'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nome') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group{{ $errors->has('preco') ? ' has-error' : '' }}">
                                    <label for="preco" class="col-md-4 control-label">Preco</label>

                                    <div class="col-md-6">
                                        <input id="preco" type="number" class="form-control" name="preco" value="{{ old('preco') }}" required>

                                        @if ($errors->has('nome'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('preco') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                    <label for="tipo" class="col-md-4 control-label">Tipo</label>

                                    <div class="col-md-6">
                                        <select id="tipo" name="tipo" class="form-control" required>
                                            <option value="">Selecione o tipo do produto</option>
                                            @foreach($tipos as $tipo)
                                                <option value="{{ $tipo->id }}" {{ old('tipo') == $tipo->id ? 'selected' : ''}}>{!! $tipo->nome !!}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('tipo'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tipo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group{{ $errors->has('imagem') ? ' has-error' : '' }}">
                                    <label for="imagem" class="col-md-4 control-label">Foto</label>

                                    <div class="col-md-6">
                                        <input class="form-control" id="imagem" name="imagem" type="file" required>

                                        @if ($errors->has('imagem'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('imagem') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <button class="btn btn-default" onclick="history.back()">Cancelar</button>
                                <button class="btn btn-info" type="reset">Limpar</button>
                                <button class="btn btn-success" type="submit">Criar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
