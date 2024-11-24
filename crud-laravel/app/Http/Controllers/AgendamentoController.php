<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Servico;
use App\Http\Requests\StoreUpdateAgendamento;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function index()
{
    $agendamentos = Agendamento::with(['cliente', 'servico', 'funcionario'])->get();
    $total_agendamentos = Agendamento::count();

    return view('agendamento', compact('agendamentos', 'total_agendamentos'));
}


    public function store(StoreUpdateAgendamento $request)
    {
        $existeAgendamento = Agendamento::where('id_user', auth()->id())
            ->where('data_agendamento', '>=', now())
            ->exists();

        if ($existeAgendamento) {
            return back()->with('error', 'Você já tem um agendamento futuro e não pode agendar novamente.');
        }

        Agendamento::create([
            'telefone_cliente' => $request->telefone_cliente,
            'data_agendamento' => $request->data_agendamento,
            'horario_agendamento' => $request->horario_agendamento,
            'observacoes' => $request->observacoes,
            'referencias' => $request->referencias,
            'id_servico' => $request->id_servico,
            'id_user' => auth()->id(),
            'id_funcionario' => $request->id_funcionario,
        ]);

        return back()->with('success', 'Agendamento realizado com sucesso!');
    }


    public function update(StoreUpdateAgendamento $request, $id)
    {
        $agendamento = Agendamento::findOrFail($id);

        $agendamento->update([
            'telefone_cliente' => $request->telefone_cliente,
            'data_agendamento' => $request->data_agendamento,
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
