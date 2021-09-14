<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FuncionarioInvestimentos;
use App\Models\Funcionario;
use App\Models\Investimento;
use Illuminate\Validation\Rule;

class FuncionarioInvestimentosController extends Controller
{
    public function index($id)
    {
        $funcionario = Funcionario::with('investimentos')->find($id);
        return view('FuncionarioInvestimentos.index', compact('funcionario'));
    }

    public function create($id)
    {
        $funcionario = Funcionario::find($id);
        $investimentos = Investimento::all();

        return view('FuncionarioInvestimentos.create', compact('funcionario','investimentos'));
    }

    public function store(Request $request)
    {
        $request->validate([ //adicionando regras de validação para existir apenas um investimento_id por usuario LARAVEL VALIDATOR
            'investimento_id'=>[ //Cria regras para poder puxar o investimento_id
                'required', //Regra que especifica que é necessário ter um investimento_id
                'exists:investimentos,id', //Regra que especifica que é necessário ter o id dentro da tabela investimentos
                Rule::unique('funcionario_investimento','investimento_id')->where(function($query) use ($request){ //define que pode ter apenas um de cada na index
                    return $query->where('funcionario_id', $request->funcionario_id);
                }),
            ],
        ]);

        Funcionario::find($request->funcionario_id)->investimentos()->attach($request->investimento_id,['valor'=> $request->valor]);

        // $funcionarioInvestimentos = FuncionarioInvestimentos::create($dados);

        return redirect('/');
    }

    public function edit($id, $investimento_id) //
    {
        $funcionario = Funcionario::findOrFail($id);
        $investimento = $funcionario->investimentos()->where('investimento_id',$investimento_id)->first();

        return view('FuncionarioInvestimentos.edit', compact('funcionario', 'investimento'));
    }

    public function update(Request $request, $id, $investimento_id)
    {
        // $investimento = Investimento::with('funcionarios')->find($id);
        $funcionario = FuncionarioInvestimentos::findOrFail($id);

        $funcionario->update([
            'funcionario_id'=>$request->funcionario_id,
            'investimento_id'=>$request->investimento_id,
            'valor'=>$request->valor,
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        FuncionarioInvestimentos::destroy($id);

        return redirect('/');
    }
}
