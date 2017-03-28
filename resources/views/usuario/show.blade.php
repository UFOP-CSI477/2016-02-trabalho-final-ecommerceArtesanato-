@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuário - Detalhes</div>
                    <div class="panel-body text-center">

                        <div class="row">
                            <h2 class="text-center">Dados pessoais</h2>
                            <form class="form-horizontal" role="form">

                                <div class="form-group">
                                    <label for="nome" class="col-md-4 control-label">Nome</label>

                                    <div class="col-md-6">
                                        <input id="nome" type="text" class="form-control" readonly value="{{ $usuario->nome }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" value="{{ $usuario->email }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="endereco" class="col-md-4 control-label">Endereço</label>

                                    <div class="col-md-6">
                                        <input id="endereco" type="text" class="form-control" value="{{ $usuario->endereco }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="telefone" class="col-md-4 control-label">Telefone</label>

                                    <div class="col-md-6">
                                        <input id="telefone" type="text" class="form-control" value="{{ $usuario->telefone ? $usuario->telefone : 'Não informado' }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tipo" class="col-md-4 control-label">Tipo</label>

                                    <div class="col-md-6">
                                        <input id="tipo" type="text" class="form-control" value="{{ $usuario->tipo->nome }}" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="row">
                            <h2 class="text-center">Compras</h2>
                            <div class="table">
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Pago</th>
                                        <th>Criada em</th>
                                        <th>Atualizada em</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($usuario->compras as $compra)
                                        <tr>
                                            <td>{!! $compra->id !!}</td>
                                            <td>{!! $compra->pago ? 'Pago' : 'Aguardando Pagamento' !!}</td>
                                            <td>{!! $usuario->created_at !!}</td>
                                            <td>{!! $usuario->updated_at !!}</td>
                                            <td>
                                                <a class="btn btn-default btn-xs" href="{{ route('compra.show', $usuario->id) }}">Detalhes</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-warning text-center" onclick="history.back()" role="button">Voltar</button>
                        <a class="btn btn-primary" role="button" href="{{ route('usuario.edit', $usuario->id) }}">Editar</a>
                    </div>

                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
