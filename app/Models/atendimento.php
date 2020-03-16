<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class atendimento extends Model
{
    protected $table = 'atendimento';
    protected $fillable = [
        'paciente_id',
        'dt_atendimento',
        'user_id_medico',
        'carteira',
        'convenio_id',
        'ds_plano',
        'mes_agendamento',
        'dia_agendamento',
        'hora_agendamento'
    ];

    public function paciente()
    {
        return $this->belongsTo(paciente::class, 'paciente_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id_medico');
    }

    public function convenio()
    {
        return $this->belongsTo(Convenio::class, 'convenio_id');
    }
}
