@extends('base')
@section('titulo', 'Listagem de Varinhas')
@section('conteudo')

    <h3>Listagem de Varinhas</h3>
    <div class="row mb-4">
        <form action="{{ route('produto.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-3">
                    <select name="tipo" class="form-select">
                        <option value="nome_varinha">Nome da Varinha</option>
                        <option value="flexibilidade">Flexibilidade</option>
                        <option value="nucleo">Núcleo</option>
                        <option value="tipo_madeira">Tipo de Madeira</option>
                    </select>
                </div>
                <div class="col-5">
                    <input type="text" name="valor" class="form-control">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a class="btn btn-success" href="{{ url('produto/create') }}">Novo</a>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome da Varinha</th>
                    <th scope="col">Flexibilidade</th>
                    <th scope="col">Núcleo</th>
                    <th scope="col">Tipo de Madeira</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->nomevarinha }}</td>
                        <td>{{ $item->flexibilidade }}</td>
                        <td>{{ $item->nucleo }}</td>
                        <td>{{ $item->tipomadeira }}</td>
                        <td><a href="{{ route('produto.edit', $item->id) }}">Editar</a></td>
                        <td>
                            <form action="{{ route('produto.destroy', $item->id) }}" method="post">
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
