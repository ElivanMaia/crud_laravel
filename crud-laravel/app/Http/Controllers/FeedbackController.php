<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('feedback', compact('feedbacks'));
    }

    public function create()
    {
        return view('feedbacks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'avaliacao' => 'required|integer|between:1,5',
            'mensagem' => 'required|string',
        ]);

        Feedback::create([
            'avaliacao' => $request->avaliacao,
            'mensagem' => $request->mensagem,
            'sugestoes' => $request->sugestoes,
        ]);

        return back()->with('success', 'Feedback enviado com sucesso!');

    }


    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->route('feedbacks.index')->with('success', 'Feedback excluído com sucesso!');
    }
}
