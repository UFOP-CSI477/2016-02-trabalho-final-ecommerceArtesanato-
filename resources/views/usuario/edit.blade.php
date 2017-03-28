@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuário - Editar</div>
                    <div class="panel-body text-center">

                        <form
                                class="form-horizontal" role="form" method="POST"
                                @can('administrar') action="{{ route('usuario.update', $usuario->id) }}" @endcan
                                @cannot('administrar') action="{{ route('usuario.alterar.dados', $usuario->id) }}" @endcannot
                        >
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="nome" class="col-md-4 control-label">Nome</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') ? old('nome') : $usuario->nome}}" maxlength="255" required autofocus>

                                    @if ($errors->has('nome'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nome') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $usuario->email }}" maxlength="255" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('senha') ? ' has-error' : '' }}">
                                <label for="senha" class="col-md-4 control-label">Senha</label>

                                <div class="col-md-6">
                                    <input id="senha" type="password" class="form-control" name="senha" minlength="6" placeholder="Deixe em branco para não alterar a senha">

                                    @if ($errors->has('senha'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('senha') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                                <label for="endereco" class="col-md-4 control-label">Endereço</label>

                                <div class="col-md-6">
                                    <input id="endereco" type="text" class="form-control" name="endereco" maxlength="255" value="{{ old('endereco') ? old('endereco') : $usuario->endereco }}" required>

                                    @if ($errors->has('endereco'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('endereco') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                                <label for="telefone" class="col-md-4 control-label">Telefone</label>

                                <div class="col-md-6">
                                    <input id="telefone" type="text" class="form-control" name="telefone" maxlength="255" value="{{ old('telefone') ? old('telefone') : $usuario->telefone }}">

                                    @if ($errors->has('telefone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            @can('administrar')
                                <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                    <label for="tipo" class="col-md-4 control-label">Tipo</label>

                                    <div class="col-md-6">
                                        <select id="tipo" class="form-control" name="tipo" required>
                                            <option value="">Selecione o tipo</option>
                                            @foreach($tipos as $tipo)
                                                <option value="{{ $tipo->id }}" {{ $tipo->id == $usuario->tipo_usuario_id ? 'selected' : ''}}>{!! $tipo->nome !!}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('tipo'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('tipo') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            @endcan

                            @cannot('administrar')
                                <input name="tipo" type="hidden" value="{{ auth()->user()->tipo_usuario_id }}">
                            @endcannot

                            <div class="text-center">
                                <button class="btn btn-default" role="button" type="button" onclick="history.back()">Voltar</button>
                                <button class="btn btn-warning" role="button" type="reset">Resetar</button>
                                <button class="btn btn-success" role="button" type="submit">Aplicar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection