<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $servicos = Servico::all();

        return view('dashboard', compact('servicos'));
    }
}

