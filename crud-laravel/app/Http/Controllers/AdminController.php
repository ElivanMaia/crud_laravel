<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;

class AdminController extends Controller
{
    public function index()
    {
        $total_agendamentos = Agendamento::count();

        return view('admin', compact('total_agendamentos'));
    }

    public function showAgendamentos()
    {
        $agendamentos = Agendamento::with('servico')->get();

        return view('agendamento', compact('agendamentos'));
    }
}


