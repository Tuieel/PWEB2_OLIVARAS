<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Storage;

class FornecedorController extends Controller
{
    function index()
    {
        $dados = Fornecedor::all();
        return view('fornecedor.list', ['dados' => $dados]);
    }

    function create()
    {
        return view('fornecedor.form');
    }

    function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:130|min:3',
            'material' => 'required|max:50',
            'materia_prima' => 'required|max:50',
        ]);

        Fornecedor::create($request->all());
        return redirect('fornecedor');
    }

    function edit($id)
    {
        $dado = Fornecedor::find($id);
        return view('fornecedor.form', ['dado' => $dado]);
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:130|min:3',
            'material' => 'required|max:50',
            'materia_prima' => 'required|max:50',
        ]);

        Fornecedor::updateOrCreate(['id' => $id], $request->all());
        return redirect('fornecedor');
    }

    public function destroy($id)
    {
        Fornecedor::findOrFail($id)->delete();
        return redirect('fornecedor');
    }

    public function search(Request $request)
    {
        $dados = Fornecedor::where($request->tipo, 'like', "%$request->valor%")->get();
        return view('fornecedor.list', ['dados' => $dados]);
    }
}
