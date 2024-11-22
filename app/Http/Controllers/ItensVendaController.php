<?php
namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Storage;

class ItensVendaController extends Controller
{
    function index()
    {
        $dados = Produto::all();
        return view('itensvenda.list', ['dados' => $dados]);
    }

    function create()
    {
        return view('itensvenda.form');
    }

    function store(Request $request)
    {
        $request->validate([
            'quantidade' => 'required|max:130|min:1',
        ], [
            'quantidade' => 'A quantidade é obrigatória!',
        ]);

        Produto::create($request->all());
        return redirect('itensvenda');
    }

    function edit($id)
    {
        $dado = Produto::find($id);
        return view('itensvenda', ['dado' => $dado]);
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'quantidade' => 'required|max:130|min:1',
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
