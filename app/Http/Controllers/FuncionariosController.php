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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            // 'avatar' => 'avatar',
        ],
        [
            'first_name.required' => 'O campo Primeiro Nome precisa ser preenchido',
            'last_name.required' => 'O campo Último Nome precisa ser preenchido',
            'email.required' => 'O campo email precisa ser preenchido',
            // 'avatar' => 'avatar',
        ]);

        $dados = $request->only([
            'first_name','last_name','email',
            // 'avatar'
        ]);

        // $dados = $request->only([
        //     'first_name','last_name','email',
        //     // 'avatar'
        // ]);

        $funcionarios = Funcionario::create($dados);
        return redirect('/funcionarios');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $funcionario = Funcionario::find($id);
        return view('Funcionarios.edit', compact('funcionario'));
    }

    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::find($id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            // 'avatar' => 'avatar',
        ],
        [
            'first_name.required' => 'O campo Primeiro Nome precisa ser preenchido',
            'last_name.required' => 'O campo Último Nome precisa ser preenchido',
            'email.required' => 'O campo email precisa ser preenchido',
            // 'avatar' => 'avatar',
        ]);

        $funcionario->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            //'avatar'=>$request->avatar,
        ]);

        return redirect('/funcionarios');
    }

    public function destroy(Request $request) //poderia ser ($id)
    {
        Funcionario::destroy($request->id); //Funcionario::destroy($id)

        return redirect('/funcionarios');
    }
}
