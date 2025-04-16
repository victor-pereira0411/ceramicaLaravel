<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Brick\Math\BigInteger;

class ClienteController extends Controller
{
    public readonly Cliente $cliente;

    public function __construct()
    {
        $this->cliente = new Cliente();
    }

    public function index()
    {
        $cliente = Cliente::all();
        return view('clientes', ['cliente' => $cliente]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crudCliente/createCliente');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:4',
        ]);

        $created = $this->cliente->create([
            'nome' => $request->input('nome'),
            'tipoTelha' => $request->input('tipoTelha')
        ]);

        if ($created) {
            return redirect()->route('cliente')->with('message', 'O cliente "' . $created->nome  . '" foi adicionado com sucesso!');
        }

        return redirect()->route('crudCliente/createCliente')->with('message', 'Falha ao adicionar o cliente, tente novamente!');
    }

    public function edit($id)
    {
        $cliente = Cliente::select('id','nome', 'tipoTelha')->find($id);
        return view('crudCliente/editCliente', ['cliente' => $cliente]);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|min:4',
        ]);

        $cliente = Cliente::findOrFail($id);

        $cliente->nome = $request->input('nome');
        $cliente->tipoTelha = $request->input('tipoTelha');
        $cliente->save();

        if ($cliente->wasChanged()) {
            return redirect()->route('cliente')->with('message', 'Cliente ' . $cliente->name . ' atualizado com sucesso');
        }

        return redirect()->route('cliente')->with('message', 'Erro ao atualizar o cliente!');
    }

    public function destroy(string $id)
    {
        $this->cliente->where('id', $id)->delete();

        return redirect()->route('cliente')->with('message', 'Cliente deletado com sucesso!');
    }
}
 