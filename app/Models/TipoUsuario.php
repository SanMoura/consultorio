<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipo_usuario';
    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'tipo_usuario_id');
    }
}

