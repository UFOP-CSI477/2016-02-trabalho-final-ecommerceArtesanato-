@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuário - Lista</div>
                    <div class="panel-body text-center">
                        <div class="table">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Tipo</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{!! $usuario->id !!}</td>
                                        <td>{!! $usuario->nome !!}</td>
                                        <td>{!! $usuario->email !!}</td>
                                        <td>{!! $usuario->tipo->nome !!}</td>
                                        <td>
                                            <a class="btn btn-info btn-xs" href="{{ route('usuario.edit', $usuario->id) }}">Editar</a>
                                            <a class="btn btn-default btn-xs" href="{{ route('usuario.show', $usuario->id) }}">Detalhes</a>
                                            <form method="post" action="{{ route('usuario.destroy', $usuario->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="id" value="{{ $usuario->id }}">
                                                <button class="btn btn-danger btn-xs" role="button" type="submit">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-warning" role="button" onclick="history.back()">Voltar</button>
                            <a class="btn btn-primary" role="button" href="{{ route('tipoproduto.create') }}">Criar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
