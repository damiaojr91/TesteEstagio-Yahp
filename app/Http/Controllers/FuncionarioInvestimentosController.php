<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function store(Request $request, $id)
    {
        $request->validate([ //adicionando regras de validação para existir apenas um investimento_id por usuario LARAVEL VALIDATOR
            'investimento_id'=>[ //Cria regras para poder puxar o investimento_id
                'required', //Regra que especifica que é necessário ter um investimento_id
                'exists:investimentos,id', //Regra que especifica que é necessário ter o id dentro da tabela investimentos
                Rule::unique('funcionario_investimento','investimento_id')->where(function($query) use ($request){ //define que pode ter apenas um de cada na index
                    return $query->where('funcionario_id', $request->funcionario_id);
                }),
            ],
            'valor' => 'required',
        ],
        [
            'valor.required' => 'O campo Valor não pode ser nulo!',
        ]);

        Funcionario::find($request->funcionario_id)->investimentos()->attach($request->investimento_id,['valor'=> $request->valor]);

        return redirect()->route('indexFuncionarioInvestimentos', $id);
    }

    public function edit(Request $request, $id, $investimento_id)
    {
        $funcionario = Funcionario::with('investimentos')->find($id);
        $investimento = $funcionario->investimentos()->where('investimento_id',$investimento_id)->first();

        return view('FuncionarioInvestimentos.edit', compact('funcionario','investimento'));
    }

    public function update(Request $request, $id, $investimento_id)
    {

        $funcionario = Funcionario::findOrFail($id); //Encontra o funcionario
        $investimento = $funcionario->investimentos(); //Busca todos os investimentos do funcionario, não usa o first porque estamos trazendo uma model toda

        $request->validate([
            'valor' => 'required',
        ],
        [
            'valor.required' => 'O campo Valor precisa ser preenchido',
        ]);

        $investimento->updateExistingPivot($investimento_id, [ //em caso de atualizar tabelas pivot
            'valor'=>$request->valor,
        ]);

        return redirect()->route('indexFuncionarioInvestimentos', $id);
    }

    public function destroy($id, $investimento_id)
    {
        $funcionario = Funcionario::find($id);
        $investimento = $funcionario->investimentos()->detach($investimento_id);

        return redirect()->route('indexFuncionarioInvestimentos', $id);
    }
}
