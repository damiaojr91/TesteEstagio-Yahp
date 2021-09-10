@extends('Layout.layout')

@section('content')

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-6 p-lg-3 mx-auto my-5">
        <h1 class="display-5 fw-normal">Investimentos XasTree Financial</h1>
        <p class="lead fw-normal">Abaixo você pode conferir a lista de investimentos disponíveis: </p>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>

    <main class="container mt-5">
        <div class="row">
            <div class="offset-3 col-6 starter-template py-5 px-3">

                <div class="btn-group my-5" role='group'>
                    <a href="{{ route('createInvestimento') }}" class="btn btn-success">Adicionar</a>
                </div>

                <div class="btn-group my-5" role='group'>
                    <a href="{{ route('home') }}" class="btn btn-info">Voltar</a>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Investimento</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Valor</th>
                        <th> </th>
                    </tr>
                    </thead>
                   <tbody>
                        @foreach ($investimentos as $investimento)
                            <tr>
                                <td>{{$investimento['nome']}}</td>
                                <td>{{$investimento['tipo']}}</td>
                                <td>{{$investimento['valor_investimento']}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('editInvestimento', $investimento->id)}}" class="btn btn-info btn-sm" role="button">Editar</a>

                                        <form method="POST" action={{route('deleteInvestimento', $investimento['id'])}}>
                                            @csrf
                                            @method('DELETE') {{-- o HTML não suporta o método "DELETE", por isso é importante chamar o método "POST" e chamar logo em seguinda o método de deleção utilizando PHP--}}

                                            <button type="submit" class="btn btn-danger">Deletar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>


            </div>
        </div>
    </main>

    @endsection
