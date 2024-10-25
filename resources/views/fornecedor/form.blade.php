@extends('base')
@section('titulo', 'Formulário Fornecedor')
@section('conteudo')
    <h3>Formulário Fornecedor</h3>

    @php
        if (!empty($dado->id)) {
            $route = route('fornecedor.update', $dado->id);
        } else {
            $route = route('fornecedor.store');
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
                <label class="form-label">Nome</label><br>
                <input type="text" name="nome" class="form-control"
                    value="@if (!empty($dado->nome)) {{ $dado->nome }}
                    @elseif (!empty(old('nome'))){{ old('nome') }}
                    @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Material Fornecido</label><br>
                <input type="text" name="material" class="form-control"
                    value="@if (!empty($dado->material)) {{ $dado->material }}
                    @elseif (!empty(old('material'))){{ old('material') }}
                    @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Região de Matéria-Prima</label><br>
                <input type="text" name="materia_prima" class="form-control"
                    value="@if (!empty($dado->materia_prima)) {{ $dado->materia_prima }}
                    @elseif (!empty(old('materia_prima'))){{ old('materia_prima') }}
                    @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('fornecedor') }}" class="btn btn-light">Voltar</a>
            </div>
        </form>

    </div>

@stop
