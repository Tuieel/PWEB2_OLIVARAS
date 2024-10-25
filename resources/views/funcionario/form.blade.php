@extends('base')
@section('titulo', 'Formulário Funcionário')
@section('conteudo')
    <h3>Formulário Funcionário</h3>

    @php
        if (!empty($dado->id)) {
            $route = route('funcionario.update', $dado->id);
        } else {
            $route = route('funcionario.store');
        }
    @endphp

    <div class="row">

        <form action="{{ $route }}" method="post" enctype="multipart/form-data">
            @csrf

            @if (!empty($dado->id))
                @method('put')
            @endif

            <input type="hidden" name="id"
                value="@if (!empty($dado->id)) {{ $dado->id }}
            @else{{ '' }} @endif">

            <div class="col-6">
                <label class="form-label">Nome do Funcionário</label><br>
                <input type="text" name="nome" class="form-control"
                    value="@if (!empty($dado->nome)) {{ $dado->nome }}
                    @elseif (!empty(old('nome'))){{ old('nome') }}
                    @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Hierarquia</label><br>
                <input type="text" name="hierarquia" class="form-control"
                    value="@if (!empty($dado->hierarquia)) {{ $dado->hierarquia }}
                    @elseif (!empty(old('hierarquia'))){{ old('hierarquia') }}
                    @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Salário</label><br>
                <input type="number" step="0.01" name="salario" class="form-control"
                    value="@if (!empty($dado->salario)) {{ $dado->salario }}
                    @elseif (!empty(old('salario'))){{ old('salario') }}
                    @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Total de Vendas</label><br>
                <input type="number" step="0.01" name="total_vendas" class="form-control"
                    value="@if (!empty($dado->total_vendas)) {{ $dado->total_vendas }}
                    @elseif (!empty(old('total_vendas'))){{ old('total_vendas') }}
                    @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('funcionario') }}" class="btn btn-light">Voltar</a>
            </div>
        </form>

    </div>

@stop
