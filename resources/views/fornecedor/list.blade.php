@extends('base')
@section('titulo', 'Listagem de Fornecedores')
@section('conteudo')

    <h3>Listagem Fornecedores</h3>
    <div class="row mb-4">
        <form action="{{ route('fornecedor.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-3">
                    <select name="tipo" class="form-select">
                        <option value="nome">Nome do Fornecedor</option>
                        <option value="material">Material Fornecido</option>
                        <option value="materia_prima">Região de Matéria-Prima</option>
                    </select>
                </div>
                <div class="col-5">
                    <input type="text" name="valor" class="form-control">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a class="btn btn-success" href="{{ url('fornecedor/create') }}">Novo</a>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome do Fornecedor</th>
                    <th scope="col">Material Fornecido</th>
                    <th scope="col">Região de Matéria-Prima</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->material }}</td>
                        <td>{{ $item->materia_prima }}</td>
                        <td><a href="{{ route('fornecedor.edit', $item->id) }}">Editar</a></td>
                        <td>
                            <form action="{{ route('fornecedor.destroy', $item->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" onclick="return confirm('Deseja remover o registro?')">
                                    Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop
