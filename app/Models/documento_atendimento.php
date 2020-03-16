<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class documento_atendimento extends Model
{
    protected $fillable = [
    'documento_id',
    'atendimento_id',
    'nm_campo',
    'valor_campo',
    'dt_abertura',
    'situacao'
    ];
}
