@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Transação - Editar</div>
                    <div class="panel-body text-center">
                        <form accept-charset="UTF-8" action="{{ route('transacao.update', $transacao->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="row">
                                <div class="form-group{{ $errors->has('produto') ? ' has-error' : '' }}">
                                    <label for="produto" class="col-md-4 control-label">Produto</label>

                                    <div class="col-md-6">
                                        <select id="produto" name="produto" class="form-control" title="Tipo de produto">
                                            <option value="">Selecione o tipo de produto</option>
                                            @foreach($produtos as $produto)
                                                <option value="{{ $produto->id }}" {{ $produto->id == $transacao->produto_id ? 'selected' : '' }}>{!! $produto->nome !!}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('produto'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('produto') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group{{ $errors->has('quantidade') ? ' has-error' : '' }}">
                                    <label for="quantidade" class="col-md-4 control-label">Quantidade</label>

                                    <div class="col-md-6">
                                        <input id="quantidade" name="quantidade" type="number" class="form-control" value="{{ $transacao->quantidade }}" min="1"  required>

                                        @if ($errors->has('quantidade'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('quantidade') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group{{ $errors->has('cor') ? ' has-error' : '' }}">
                                    <label for="cor" class="col-md-4 control-label">Cor</label>

                                    <div class="col-md-6">
                                        <input id="cor" name="cor" type="color" class="form-control" value="{{ $transacao->cor }}" maxlength="255"  required>

                                        @if ($errors->has('cor'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('cor') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group{{ $errors->has('bordado') ? ' has-error' : '' }}">
                                    <label for="bordado" class="col-md-4 control-label">Bordado</label>

                                    <div class="col-md-6">
                                        <input id="bordado" name="bordado" type="text" class="form-control" value="{{ $transacao->bordado }}" maxlength="255"  required>

                                        @if ($errors->has('bordado'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('bordado') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <button class="btn btn-default" onclick="history.back()">Cancelar</button>
                                <button class="btn btn-info" type="reset">Resetar</button>
                                <button class="btn btn-success" type="submit">Aplicar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
