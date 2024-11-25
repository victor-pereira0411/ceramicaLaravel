<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producao;
use Brick\Math\BigInteger;
use App\Models\Secamento;

class ProducaoController extends Controller
{
    public readonly Producao $Producaos;

    public function __construct()
    {
        $this->Producaos = new Producao();
    }

    public function dashboard()
    {
        $Producao =  Producao::orderBy('milheirosProduzidos', 'desc')->take(4)->get();
        return view('dashboard', ['producao' => $Producao ]);
    }

    public function index()
    {
        $Producao = Producao::all();
        return view('producao', ['producao' => $Producao]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crudProducao/createProducao');
    }


    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'producao' => 'required|numeric|min:0',
        ], [
            'date.required' => 'O campo nome é obrigatório.',
            'producao.required' => 'O campo produção por milheiro é obrigatório.',
            'producao.numeric' => 'O campo produção por milheiro deve ser numérico.',
            'producao.min' => 'O valor de ganho por milheiro deve ser positivo.',
        ]);
        $created = $this->Producaos->create([
            'dataProducao' => $request->input('date'),
            'milheirosProduzidos' => $request->input('producao'),
        ]);

        if ($created) {
            return redirect()->route('producao')->with('message', 'Produção do dia ' .  date( 'd/m/Y' , strtotime($created->dataProducao)) . ' adicionada com sucesso!');
        }

        return redirect()->route('crudProducao/createProducao')->with('message', 'Falha ao adicionar a produção, tente novamente!');
    }

    public function edit($id)
    {
        $producao = Producao::select('dataProducao', 'milheirosProduzidos', 'id')->find($id);
        return view('crudProducao/editProducao', ['producao' => $producao]);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'date' => 'required|date',
            'producao' => 'required|numeric|min:0',
        ], [
            'date.required' => 'O campo nome é obrigatório.',
            'producao.required' => 'O campo produção por milheiro é obrigatório.',
            'producao.numeric' => 'O campo produção por milheiro deve ser numérico.',
            'producao.min' => 'O valor de ganho por milheiro deve ser positivo.',
        ]);

        $producao = Producao::findOrFail($id);

        $producao->dataProducao = $request->input('date');
        $producao->milheirosProduzidos = $request->input('producao');
        $producao->save();

        if ($producao->wasChanged()) {
            return redirect()->route('producao')->with('message', 'Produção atualizada com sucesso');
        }

        return redirect()->route('producao')->with('message', 'Erro ao atualizar a produção');
    }

    public function destroy(string $id)
    {
        $this->Producaos->where('id', $id)->delete();

        return redirect()->route('producao')->with('message', 'Produção deletada com sucesso!');
    }
}
