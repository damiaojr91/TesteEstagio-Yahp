<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investimento;

class InvestimentosController extends Controller
{
    public function index()
    {
        $investimentos = Investimento::all();
        return view ('Investimentos.index')->with('investimentos',$investimentos);
    }

    public function create()
    {

        return view('Investimentos.create');

    }

    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'tipo' => 'required',
        ],
        [
            'nome.required' => 'O campo Nome precisa ser preenchido',
            'tipo.required' => 'O campo Tipo precisa ser preenchido',
        ]);

        $dados = $request->only([
            'nome','tipo',
        ]);

        $investimentos = Investimento::create($dados);
        return redirect('/investimentos');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $investimento = Investimento::find($id);
        return view('Investimentos.edit', compact('investimento'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'tipo' => 'required',
        ],
        [
            'nome.required' => 'O campo Nome precisa ser preenchido',
            'tipo.required' => 'O campo Tipo precisa ser preenchido',
        ]);

        $investimento = Investimento::find($id);

        $investimento->update([
            'nome'=>$request->nome,
            'tipo'=>$request->tipo,
        ]);

        return redirect('/investimentos');
    }

    public function destroy($id) //poderia ser (Request $request)
    {
        Investimento::destroy($id); //Investimento::destroy($request->id);

        return redirect('/investimentos');
    }
}
