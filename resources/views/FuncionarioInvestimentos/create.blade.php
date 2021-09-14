@extends('Layout.layout')

@section('content')

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-6 p-lg-3 mx-auto my-5">
            <h1 class="display-5 fw-normal">Atualizar Investimentos</h1>
            <p class="lead fw-normal">Vincule investimentos ao funcionário <b>{{ $funcionario->first_name }} {{ $funcionario->last_name }}</b></p>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>

    <form method="POST" action="{{ route('storeFuncionarioInvestimentos', $funcionario->id) }}">
        @csrf
        <div class="col-md-6 p-lg-3 mx-auto my-5 form-group row">

            <input type="hidden" class="form-control" id="colFormLabel" name="funcionario_id" value="{{ $funcionario->id }}"> {{--Esconde o ID do funcionário na exibição mas ainda assim carrega no formulário--}}

            <div>
                <label for="colFormLabel" name=funcionario_nome><b>Funcionário:</b> {{ $funcionario->first_name }} {{ $funcionario->last_name }}</label>
            </div>

            <label for="colFormLabel" class="col-sm-3 col-form-label"><b>Selecione o investimento: </b></label>
            <div class="col-sm-4">
                <select name="investimento_id">
                    @foreach ($investimentos as $investimento)
                        <option value="{{ $investimento->id }}">{{ $investimento->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-3 col-form-label"><b>Valor: </b></label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="colFormLabel" name="valor" placeholder="Insira o valor do investimento.">
                </div>
            </div>

            <div class="btn-group mx-auto my-5" role='group'>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('home') }}" class="btn btn-info btn" role="button">Voltar</a>
            </div>
        </div>
    </form>

@endsection
