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
                <div class="d-flex btn-group " role='group'>
                    <a href="{{ route('indexFuncionarios') }}" class="btn btn-info">Funcionários</a>
                    <a href="{{ route('indexInvestimentos') }}" class="btn btn-success">Investimentos</a>
                </div>

                <div>
                    <table class="table mt-5">
                        <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Sobrenome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Investimentos</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($funcionarios as $funcionario)
                                <tr>
                                    <td>{{$funcionario['first_name']}}</td>
                                    <td>{{$funcionario['last_name']}}</td>
                                    <td>{{$funcionario['email']}}</td>
                                    <td>{{$funcionario['investimento']}}</td>
                                </tr>
                            @endforeach
                        </tbody>

                        {{-- <tbody>
                            <tr>
                                <td>TESTE</td>
                                <td>TESTE</td>
                                <td>TESTE</td>
                                <td>TESTE</td>
                            </tr>
                        </tbody> --}}

                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
