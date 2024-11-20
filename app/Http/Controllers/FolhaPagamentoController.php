<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Producao;
use App\Models\FolhaPagamento;
use Brick\Math\BigInteger;

class FolhaPagamentoController extends Controller
{
    public readonly FolhaPagamento $folha;

    public readonly Producao $producaos;

    public function __construct()
    {
        $this->folha = new FolhaPagamento();
    }

    public function index()
    {
        $folha = FolhaPagamento::with('funcionario')->get();
        return view('folhaPagamento', ['folha' => $folha]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Verifica se existem milheiros produzidos na tabela Producao
        $milheiros = Producao::sum('milheirosProduzidos');
        if ($milheiros == 0) {
            return redirect()->route('producao')->with('messageWarning', 'Não há produções cadastradas para se realizar pagamento!');
        }

        // Verifica se existem funcionários cadastrados
        $funcionarios = Funcionario::select('idFuncionario', 'ganhoMilheiro')->get();
        if ($funcionarios->isEmpty()) {
            return redirect()->route('producao')->with('messageWarning', 'Não há funcionários cadastrados para realizar o pagamento!');
        }

        $folhapendente = $this->folha->exists();

        if ($folhapendente) {
            return redirect()->route('producao')->with('messageWarning', 'Realize o pagamento da última folha de pagamento!');
        }
        
        foreach ($funcionarios as $funcionario) {
            $salario = $milheiros * $funcionario->ganhoMilheiro;

            $created = $this->folha->create([
                'somaMilheiros' => $milheiros,
                'funcionario_id' => $funcionario->idFuncionario, 
                'valorMilheiro' => $funcionario->ganhoMilheiro,  
                'salario' => $salario,
            ]);
        }

        if ($created) {
            Producao::truncate();
            return redirect()->route('producao')->with('message', 'Produção finalizada com sucesso!');
        }

        return redirect()->route('crudProducao/createProducao')->with('message', 'Falha ao adicionar a produção, tente novamente!');
    }
    public function destroy()
    {
        $folhaVazia = FolhaPagamento::count() == 0;

        if ($folhaVazia) {
            return redirect()->route('folhaPagamento.index')->with('messageWarning', 'Não há folha de pagamento para ser finalizada!');
        }

        FolhaPagamento::truncate();

        return redirect()->route('folhaPagamento.index')->with('message', 'Folha de pagamento finalizada com sucesso!');
    }
}
