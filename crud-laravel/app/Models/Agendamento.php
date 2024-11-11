<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamentos';

    protected $fillable = [
        'id_user',
        'telefone_cliente',
        'horario_agendamento',
        'observacoes',
        'referencias',
        'id_servico'
    ];

    protected $dates = ['horario_agendamento'];

    protected $casts = [
        'horario_agendamento' => 'datetime',
    ];

    // Relacionamento com o cliente (User)
    public function cliente()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relacionamento com o serviço
    public function servico()
    {
        return $this->belongsTo(Servico::class, 'id_servico');
    }
}
