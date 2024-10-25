<?php
namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Storage;

class ProdutoController extends Controller
{
    function index()
    {
        $dados = Produto::all();
        return view('produto.list', ['dados' => $dados]);
    }

    function create()
    {
        return view('produto.form');
    }

    function store(Request $request)
    {
        $request->validate([
            'nome_varinha' => 'required|max:130|min:3',
            'flexibilidade' => 'required|max:50',
            'nucleo' => 'required|max:50',
            'tipo_madeira' => 'required|max:50',
        ], [
            'nome_varinha.required' => 'O nome da varinha é obrigatório',
            'flexibilidade.required' => 'A flexibilidade é obrigatória',
            'nucleo.required' => 'O núcleo é obrigatório',
            'tipo_madeira.required' => 'O tipo de madeira é obrigatório',
        ]);

        Produto::create($request->all());
        return redirect('produto');
    }

    function edit($id)
    {
        $dado = Produto::find($id);
        return view('produto.form', ['dado' => $dado]);
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'nome_varinha' => 'required|max:130|min:3',
            'flexibilidade' => 'required|max:50',
            'nucleo' => 'required|max:50',
            'tipo_madeira' => 'required|max:50',
        ]);

        Produto::updateOrCreate(['id' => $id], $request->all());
        return redirect('produto');
    }

    public function destroy($id)
    {
        Produto::findOrFail($id)->delete();
        return redirect('produto');
    }

    public function search(Request $request)
    {
        $dados = Produto::where($request->tipo, 'like', "%$request->valor%")->get();
        return view('produto.list', ['dados' => $dados]);
    }
}
