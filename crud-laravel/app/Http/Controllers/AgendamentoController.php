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

        $agendamentos = Agendamento::with(['cliente', 'servico'])->get();

        return view('agendamento', compact('agendamentos', 'total_agendamentos'));
    }

    public function show($id)
{
    $agendamento = Agendamento::with(['cliente', 'servico', 'funcionario'])->find($id);

    if (!$agendamento) {
        return redirect()->route('agendamentos.index')->with('error', 'Agendamento não encontrado.');
    }

    return view('dashboard', compact('agendamento'));
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
            'id_funcionario' => 'required|exists:funcionarios,id',
        ]);

        $existe_agendamento = Agendamento::where('id_funcionario', $validated['id_funcionario'])
            ->where('horario_agendamento', $validated['horario_agendamento'])
            ->exists();

        if ($existe_agendamento) {
            return back()->with('error', 'Este funcionário já tem um agendamento no horário escolhido. Por favor, escolha outro horário.');
        }

        Agendamento::create([
            'telefone_cliente' => $validated['telefone_cliente'],
            'horario_agendamento' => $validated['horario_agendamento'],
            'observacoes' => $validated['observacoes'],
            'referencias' => $validated['referencias'],
            'id_servico' => $validated['id_servico'],
            'id_user' => auth()->id(),
            'id_funcionario' => $validated['id_funcionario'],
        ]);

        return back()->with('success', 'Agendamento realizado com sucesso!');
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
