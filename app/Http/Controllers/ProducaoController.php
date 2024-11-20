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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos campos
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

    // /**
    //  * Display the specified resource.
    //  */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producao = Producao::select('dataProducao', 'milheirosProduzidos', 'id')->find($id);
        return view('crudProducao/editProducao', ['producao' => $producao]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valida os dados do formulário
        $request->validate([
            'date' => 'required|date',
            'producao' => 'required|numeric|min:0',
        ], [
            'date.required' => 'O campo nome é obrigatório.',
            'producao.required' => 'O campo produção por milheiro é obrigatório.',
            'producao.numeric' => 'O campo produção por milheiro deve ser numérico.',
            'producao.min' => 'O valor de ganho por milheiro deve ser positivo.',
        ]);

        // Encontra o registro pelo ID
        $producao = Producao::findOrFail($id);

        // Atualiza os campos com os novos valores
        $producao->dataProducao = $request->input('date');
        $producao->milheirosProduzidos = $request->input('producao');

        // Salva as alterações no banco de dados fdsfsgfsg
        $producao->save();

        if ($producao->wasChanged()) {
            return redirect()->route('producao')->with('message', 'Produção atualizada com sucesso');
        }

        return redirect()->route('producao')->with('message', 'Erro ao atualizar a produção');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->Producaos->where('id', $id)->delete();

        return redirect()->route('producao')->with('message', 'Produção deletada com sucesso!');
    }
}
