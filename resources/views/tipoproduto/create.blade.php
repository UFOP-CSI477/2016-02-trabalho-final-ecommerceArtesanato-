@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Tipo Produto - Criar novo tipo</div>
                    <div class="panel-body text-center">
                        <form accept-charset="UTF-8" action="{{ route('tipoproduto.store') }}" method="post">
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
