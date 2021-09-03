@extends('Layout.layout')

@section('content')
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">

        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>

    <main class="container mt-5">
        <div class="row">
            <div class="col-12 pt-5">
                <hr />
            </div>
            <div class="offset-3 col-6 starter-template py-5 px-3">
                <h3 class="text-center"> Lista de Funcionários </h3>
                <div class="btn-group " role='group'>
                    <a href="{{ route('indexFuncionarios') }}" class="btn btn-info">Funcionários</a>
                </div>
            </div>
        </div>
    </main>
@endsection
