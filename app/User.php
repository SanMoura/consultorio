<?php

namespace App;
use App\Models\TipoUsuario;
use App\Models\Escala;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'tipo_usuario_id','password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tipo_usuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario_id');
    }

    public function escalaHorarios()
    {
        return $this->belongsTo(Escala::class, 'user_id');
    }
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    
    public function atendimento()
    {
        return $this->belongsTo(Atendimento::class, 'user_id_medico');
    }
}
