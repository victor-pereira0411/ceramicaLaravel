<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Brick\Math\BigInteger;
use App\Models\Estoque;
use App\Models\Secamento;

class EstoqueController extends Controller
{
    public readonly Estoque $estoque;

    public function index()
    {
        $estoque = Estoque::all();
        return view('estoque',['estoque' => $estoque]);
    }

    public function edit($id)
    {
        $estoque = Estoque::select('name', 'estoqueMilheiros', 'valorMilheiro', 'id')->find($id);
        return view('crudEstoque/editEstoque', ['estoque' => $estoque]);
    }
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valida os dados do formulário
        $request->validate([
            'milheiros' => 'required|numeric|min:0',
            'valor' => 'required|numeric|min:0',
        ], [
            'milheiros.required' => 'O campo milheiros disponíveis é obrigatório.',
            'valor.required' => 'O campo valor por milheiro é obrigatório.',
            'milheiros.numeric' => 'O campo milheiros disponíveis deve ser numérico.',
            'valor.min' => 'O valor de ganho por milheiro deve ser positivo.',
        ]);

        // Encontra o registro pelo ID
        $estoque = Estoque::findOrFail($id);

        // Atualiza os campos com os novos valores
        $estoque->estoqueMilheiros = $request->input('milheiros');
        $estoque->valorMilheiro = $request->input('valor');

        // Salva as alterações no banco de dados fdsfsgfsg
        $estoque->save();

        if ($estoque->wasChanged()) {
            return redirect()->route('estoque')->with('message', 'Estoque atualizado com sucesso');
        }
    
        return redirect()->route('estoque')->with('message', 'Erro ao atualizar o estoque');
    }

}