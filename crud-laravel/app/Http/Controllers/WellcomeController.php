<?php
namespace App\Http\Controllers;

use App\Models\Servico;

class WelcomeController extends Controller
{
    public function index()
    {
        $servicos = Servico::all();

        return view('welcome', compact('servicos'));
    }
}
