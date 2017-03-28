@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Compra - Editar</div>
                    <div class="panel-body text-center">
                        <form accept-charset="UTF-8" action="{{ route('compra.update', $compra->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <h4 class="text-center">Editar status da compra {{ $compra->id }}</h4>

                            <div class="row">
                                <div class="form-group{{ $errors->has('pago') ? ' has-error' : '' }}">
                                    <label for="pago" class="col-md-4 control-label">Status</label>

                                    <div class="col-md-6">
                                        <select id="pago" name="pago" class="form-control" required autofocus>
                                            <option value="">Selecione o status do pagamento</option>
                                            <option value="0" {{ $compra->pago == 0 ? 'selected' : '' }}>Aguardando pagamento</option>
                                            <option value="1" {{ $compra->pago == 1 ? 'selected' : '' }}>Pago</option>
                                        </select>
                                        @if ($errors->has('pago'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('pago') }}</strong>
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
