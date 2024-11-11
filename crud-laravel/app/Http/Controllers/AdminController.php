<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Servico;

class AdminController extends Controller
{
    public function index()
    {
        $total_agendamentos = Agendamento::count();
        $total_servicos = Servico::count();

        return view('admin', compact('total_agendamentos', 'total_servicos'));
    }

    public function showAgendamentos()
    {
        $agendamentos = Agendamento::with('servico')->get();

        return view('agendamento', compact('agendamentos'));
    }
}


