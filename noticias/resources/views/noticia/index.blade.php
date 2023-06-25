@extends('layouts.app')
 
@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Notícias</h1>
        <a href="{{ route('noticia.create') }}" class="btn btn-primary">Cadastrar Notícia</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @if($noticia->count() > 0)
                @foreach($noticia as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->titulo }}</td>
                        <td class="align-middle">{{ $rs->descricao }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('noticia.show', $rs->id) }}" type="button" class="btn btn-secondary">Detalhe</a>
                                <a href="{{ route('noticia.edit', $rs->id)}}" type="button" class="btn btn-warning">Alterar</a>
                                <form action="{{ route('noticia.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Excluir?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Notícia não encontrada.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
