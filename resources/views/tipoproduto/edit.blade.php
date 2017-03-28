@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Tipo Produto - Editar</div>
                    <div class="panel-body text-center">
                        <form accept-charset="UTF-8" action="{{ route('tipoproduto.update', $tipo->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="row">
                                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                    <label for="nome" class="col-md-4 control-label">Nome</label>

                                    <div class="col-md-6">
                                        <input id="nome" type="text" class="form-control" name="nome" value="{{ $errors->has('nome') ? old('nome') : $tipo->nome }}" required autofocus>

                                        @if ($errors->has('nome'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nome') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <button class="btn btn-default" onclick="history.back()">Cancelar</button>
                                <button class="btn btn-info" type="reset">Limpar</button>
                                <button class="btn btn-success" type="submit">Aplicar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
