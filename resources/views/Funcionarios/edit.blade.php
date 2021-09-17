@extends('Layout.layout')

@section('content')

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-6 p-lg-3 mx-auto my-5">
            <h1 class="display-5 fw-normal">Editar Funcionário</h1>
            <p class="lead fw-normal">Altere os dados para ajustar o cadastro do funcionário: </p>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>

    <form method="POST" action="{{route('updateFuncionario', $funcionario->id)}}">
        @csrf
        @method('PATCH')
        <div class="col-md-6 p-lg-3 mx-auto my-5 form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Primeiro Nome: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="colFormLabel" name="first_name" placeholder="Insira o primeiro nome" value="{{$funcionario->first_name}}">
            </div>

            <label for="colFormLabel" class="col-sm-2 col-form-label">Último Nome: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="colFormLabel" name="last_name" placeholder="Insira o último nome" value="{{$funcionario->last_name}}" >
            </div>

            <label for="colFormLabel" class="col-sm-2 col-form-label">Email: </label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="colFormLabel" name="email" placeholder="Insira o e-mail" value="{{$funcionario->email}}">
            </div>

            <div class="btn-group mx-auto my-5" role='group'>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('home') }}" class="btn btn-info btn" role="button">Voltar</a>
            </div>

            @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </ul>
            @endif

        </div>
    </form>

@endsection
