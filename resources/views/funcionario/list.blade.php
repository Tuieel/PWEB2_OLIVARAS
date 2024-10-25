@extends('base')
@section('titulo', 'Listagem Funcionários')
@section('conteudo')

    <h3>Listagem Funcionários</h3>
    <div class="row mb-4">
        <form action="{{ route('funcionario.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-3">
                    <select name="tipo" class="form-select">
                        <option value="nomefuncionario">Nome do Funcionário</option>
                        <option value="hierarquia">Hierarquia</option>
                        <option value="salario">Salário</option>
                        <option value="totalvendas">Total de Vendas</option>
                    </select>
                </div>
                <div class="col-5">
                    <input type="text" name="valor" class="form-control">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a class="btn btn-success" href="{{ url('funcionario/create') }}">Novo</a>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome do Funcionário</th>
                    <th scope="col">Hierarquia</th>
                    <th scope="col">Salário</th>
                    <th scope="col">Total de Vendas</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->nomefuncionario }}</td>
                        <td>{{ $item->hierarquia }}</td>
                        <td>{{ $item->salario }}</td>
                        <td>{{ $item->totalvendas }}</td>
                        <td><a href="{{ route('funcionario.edit', $item->id) }}">Editar</a></td>
                        <td>
                            <form action="{{ route('funcionario.destroy', $item->id) }}" method="post">
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
