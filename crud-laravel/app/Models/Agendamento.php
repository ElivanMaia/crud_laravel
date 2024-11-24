<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamentos';

    protected $fillable = [
        'id_user',
        'telefone_cliente',
        'data_agendamento',  // Data (sem hora)
        'horario_agendamento', // Hora (sem data)
        'observacoes',
        'referencias',
        'id_servico',
        'id_funcionario'
    ];

    // Trate 'data_agendamento' como 'date' (sem hora)
    protected $dates = [
        'data_agendamento',
    ];

    // 'horario_agendamento' tratado como string, pois é apenas um horário
    protected $casts = [
        'data_agendamento' => 'date', // Somente a data
        'horario_agendamento' => 'string', // Somente a hora
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'id_servico');
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'id_funcionario');
    }

    // Opcionalmente, um método para formatar o horário
    public function getFormattedHorarioAgendamentoAttribute()
    {
        // Verifique se o campo 'horario_agendamento' não está vazio antes de formatar
        return Carbon::parse($this->horario_agendamento)->format('H:i');
    }
}

