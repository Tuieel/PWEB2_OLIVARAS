@extends('base')
@section('titulo', 'Formulário Produto - Varinhas')
@section('conteudo')
    <h3>Formulário Produto -Varinha</h3>

    @php
        if (!empty($dado->id)) {
            $route = route('produto.update', $dado->id);
        } else {
            $route = route('produto.store');
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
                <label class="form-label">Nome da Varinha</label><br>
                <input type="text" name="nome_varinha" class="form-control"
                    value="@if (!empty($dado->nome_varinha)) {{ $dado->nome_varinha }}
                    @elseif (!empty(old('nome_varinha'))){{ old('nome_varinha') }}
                    @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Flexibilidade</label><br>
                <input type="text" name="flexibilidade" class="form-control"
                    value="@if (!empty($dado->flexibilidade)) {{ $dado->flexibilidade }}
                    @elseif (!empty(old('flexibilidade'))){{ old('flexibilidade') }}
                    @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Núcleo</label><br>
                <input type="text" name="nucleo" class="form-control"
                    value="@if (!empty($dado->nucleo)) {{ $dado->nucleo }}
                    @elseif (!empty(old('nucleo'))){{ old('nucleo') }}
                    @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Tipo de Madeira</label><br>
                <input type="text" name="tipo_madeira" class="form-control"
                    value="@if (!empty($dado->tipomadeira)) {{ $dado->tipomadeira }}
                    @elseif (!empty(old('tipo_madeira'))){{ old('tipo_madeira') }}
                    @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('produto') }}" class="btn btn-light">Voltar</a>
            </div>
        </form>

    </div>

@stop
