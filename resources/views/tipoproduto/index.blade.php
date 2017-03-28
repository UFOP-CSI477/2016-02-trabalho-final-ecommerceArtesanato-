@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Tipo Produto - Lista dos tipos</div>
                    <div class="panel-body text-center">
                        <div class="table">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tipos as $tipo)
                                        <tr>
                                            <td>{!! $tipo->id !!}</td>
                                            <td>{!! $tipo->nome !!}</td>
                                            <td>
                                                <a class="btn btn-info btn-xs" href="{{ route('tipoproduto.edit', $tipo->id) }}">Editar</a>
                                                <form method="post" action="{{ route('tipoproduto.destroy', $tipo->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <input type="hidden" name="id" value="{{ $tipo->id }}">
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
