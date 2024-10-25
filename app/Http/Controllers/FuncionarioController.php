<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Storage;

class FuncionarioController extends Controller
{
    function index()
    {
        $dados = Funcionario::all();
        return view('funcionario.list', ['dados' => $dados]);
    }

    function create()
    {
        return view('funcionario.form');
    }

    function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:130|min:3',
            'hierarquia' => 'required|max:50',
            'salario' => 'required|numeric',
            'total_vendas' => 'required|integer',
        ]);

        Funcionario::create($request->all());
        return redirect('funcionario');
    }

    function edit($id)
    {
        $dado = Funcionario::find($id);
        return view('funcionario.form', ['dado' => $dado]);
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:130|min:3',
            'hierarquia' => 'required|max:50',
            'salario' => 'required|numeric',
            'total_vendas' => 'required|integer',
        ]);

        Funcionario::updateOrCreate(['id' => $id], $request->all());
        return redirect('funcionario');
    }

    public function destroy($id)
    {
        Funcionario::findOrFail($id)->delete();
        return redirect('funcionario');
    }

    public function search(Request $request)
    {
        $dados = Funcionario::where($request->tipo, 'like', "%$request->valor%")->get();
        return view('funcionario.list', ['dados' => $dados]);
    }
}
