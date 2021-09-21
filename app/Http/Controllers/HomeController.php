<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Investimento;
use App\Models\Funcionario;
use App\Models\FuncionarioInvestimentos;
class HomeController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::all();
        $investimentos = Investimento::all();
        $funcionarioInvestimentos = FuncionarioInvestimentos::all();

        return view ('home',compact('funcionarios','investimentos', 'funcionarioInvestimentos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function importaFuncionario(Request $request)
    {
        $dados = Http::get('https://reqres.in/api/users')->json(); //Realiza uma requisição à API e puxa as informações salvas

        $data = $dados["data"]; //transforma a variável $dados em um array

        foreach($data as $user){ //transforma cada item do array $data em um novo arry chamado $user
            // echo($user["first_name"]) . "<br>";
            // echo($user["last_name"]). "<br>";
            // echo($user["email"]) . "<br>";

            // $emma = $data[4];
            // dd($emma);

            Funcionario::updateOrCreate([ //Verifica se os dados já existem no banco de dados, se existirem faz uma atualização das informações, senão apenas insere no banco
                "first_name" => $user["first_name"],
                "last_name" => $user["last_name"],
                "email" => $user["email"],
            ]);
        }

        return redirect()->route('indexFuncionarios')->with('message','Funcionários importados com sucesso!');
    }
}
