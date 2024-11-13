<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Servico;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $servicos = Servico::all();
        $funcionarios = Funcionario::all();

        return view('dashboard', compact('servicos', 'funcionarios'));
    }

    public function listUsers()
    {
        $usuarios = User::all();
        return view('cliente', compact('usuarios'));
    }
}

