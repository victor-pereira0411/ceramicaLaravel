<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producao;
use Brick\Math\BigInteger;
use App\Models\Funcionario;
use App\Models\FolhaPagamento;

class FuncionarioController extends Controller
{
    public readonly Funcionario $Funcionarios;

    public function __construct()
    {
        $this->Funcionarios = new Funcionario();
    }

    public function index()
    {
        $Funcionario = Funcionario::all();
        return view('funcionarios', ['funcionario' => $Funcionario]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crudFuncionario/createFuncionario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos campos com regras e mensagens personalizadas
        $request->validate([
            'name' => 'required|min:4',
            'ganhoMilheiro' => 'required|numeric|min:0',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O nome deve ter pelo menos 4 caracteres.',
            'ganhoMilheiro.required' => 'O campo ganho por milheiro é obrigatório.',
            'ganhoMilheiro.numeric' => 'O campo ganho por milheiro deve ser numérico.',
            'ganhoMilheiro.min' => 'O valor de ganho por milheiro deve ser positivo.',
        ]);

        $created = $this->Funcionarios->create([
            'name' => $request->input('name'),
            'ganhoMilheiro' => $request->input('ganhoMilheiro'),
        ]);

        if ($created) {
            return redirect()->route('funcionarios')->with('message', 'O funcionário "' . $created->name  . '" foi adicionado com sucesso!');
        }

        return redirect()->route('crudFuncionario/createFuncionario')->with('message', 'Falha ao adicionar o funcionário, tente novamente!');
    }

    // /**
    //  * Display the specified resource.
    //  */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Funcionario = Funcionario::select('name', 'ganhoMilheiro', 'idFuncionario')->find($id);
        return view('crudFuncionario/editFuncionario', ['funcionario' => $Funcionario]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valida os dados do formulário
        $request->validate([
            'name' => 'required|min:4',
            'ganhoMilheiro' => 'required|numeric|min:0',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O nome deve ter pelo menos 4 caracteres.',
            'ganhoMilheiro.required' => 'O campo ganho por milheiro é obrigatório.',
            'ganhoMilheiro.numeric' => 'O campo ganho por milheiro deve ser numérico.',
            'ganhoMilheiro.min' => 'O valor de ganho por milheiro deve ser positivo.',
        ]);

        // Encontra o registro pelo ID
        $Funcionario = Funcionario::findOrFail($id);

        // Atualiza os campos com os novos valores
        $Funcionario->name = $request->input('name');
        $Funcionario->ganhoMilheiro = $request->input('ganhoMilheiro');

        // Salva as alterações no banco de dados fdsfsgfsg
        $Funcionario->save();

        if ($Funcionario->wasChanged()) {
            return redirect()->route('funcionarios')->with('message', 'Funcionário ' . $Funcionario->name . ' atualizado com sucesso');
        }

        return redirect()->route('funcionarios')->with('message', 'Erro ao atualizar o funcionário!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Verifica se o funcionário está na tabela folhapagamento
        $funcionarioFolha = FolhaPagamento::where('funcionario_id', $id)->exists();

        if ($funcionarioFolha) {
            // Se o funcionário estiver na tabela folhapagamento, retorna uma mensagem de erro
            return redirect()->route('funcionarios')->with('error', 'Não é possível excluir o funcionário enquanto houver pagamentos pendentes. Finalize o pagamento primeiro.');
        }
        $this->Funcionarios->where('idFuncionario', $id)->delete();

        return redirect()->route('funcionarios')->with('message', 'Funcionário deletado com sucesso!');
    }
}
