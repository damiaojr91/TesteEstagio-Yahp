<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionariosController extends Controller
{
    public function index()
    {
    //     $funcionarios = [
    //     [
    //         'first_name' => 'Damiao',
    //         'last_name' => 'Silva',
    //         'email' => 'damiao@teste.com',
    //     ],
    //     [
    //         'first_name' => 'Wallace',
    //         'last_name' => 'Xavier',
    //         'email' => 'wallace@teste.com',
    //     ],
    //     [
    //         'first_name' => 'João',
    //         'last_name' => 'Silva',
    //         'email' => 'joao@teste.com',
    //     ],
    // ];

        $funcionarios = Funcionario::all();
        return view ('Funcionarios.index')->with('funcionarios',$funcionarios);
    }

    public function create()
    {

        return view('Funcionarios.create');

    }

    public function store(Request $request)
    {

        $dados = $request->only([
            'first_name','last_name','email',
            // 'avatar'
        ]);

        $funcionarios = Funcionario::create($dados);

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
