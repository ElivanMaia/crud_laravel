<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Servico;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function index()
    {
        $total_agendamentos = Agendamento::count();
        $total_clientes = \App\Models\User::count();

        // Carregar os relacionamentos 'cliente' e 'servico' ao buscar os agendamentos
        $agendamentos = Agendamento::with(['cliente', 'servico'])->get();

        return view('agendamento', compact('agendamentos', 'total_agendamentos', 'total_clientes'));
    }


    public function create()
    {
        $servicos = Servico::all();
        return view('agendamentos.create', compact('servicos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'telefone_cliente' => 'required|string|max:255',
            'horario_agendamento' => 'required|date',
            'observacoes' => 'nullable|string',
            'referencias' => 'nullable|string',
            'id_servico' => 'required|exists:servicos,id',
        ]);

        Agendamento::create([
            'telefone_cliente' => $validated['telefone_cliente'],
            'horario_agendamento' => $validated['horario_agendamento'],
            'observacoes' => $validated['observacoes'],
            'referencias' => $validated['referencias'],
            'id_servico' => $validated['id_servico'],
            'id_user' => auth()->id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Agendamento criado com sucesso!');
    }



    public function edit($id)
    {
        $agendamento = Agendamento::findOrFail($id);

        $servicos = Servico::all();

        return view('edit_agendamento', compact('agendamento', 'servicos'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'telefone_cliente' => 'required|string|max:255',
            'horario_agendamento' => 'required|date',
            'observacoes' => 'nullable|string',
            'referencias' => 'nullable|string',
        ]);

        $agendamento = Agendamento::findOrFail($id);
        $agendamento->update([
            'telefone_cliente' => $request->telefone_cliente,
            'horario_agendamento' => $request->horario_agendamento,
            'observacoes' => $request->observacoes,
            'referencias' => $request->referencias,
        ]);

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->delete();

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento excluído com sucesso!');
    }
}
