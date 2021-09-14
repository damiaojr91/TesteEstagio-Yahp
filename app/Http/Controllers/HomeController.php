<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
