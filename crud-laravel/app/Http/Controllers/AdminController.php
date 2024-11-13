<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Servico;
use App\Models\Funcionario;
use App\Models\Feedback;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
{
    $total_agendamentos = Agendamento::count();
    $total_servicos = Servico::count();
    $total_funcionarios = Funcionario::count(); 
    $total_clientes = User::count(); 
    $total_feedbacks = Feedback::count(); 

    return view('admin', compact('total_agendamentos', 'total_servicos', 'total_funcionarios', 'total_clientes', 'total_feedbacks'));
}


    public function showAgendamentos()
    {
        $agendamentos = Agendamento::with('servico')->get();

        return view('agendamento', compact('agendamentos'));
    }
}


