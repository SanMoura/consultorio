<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    protected $table = 'convenio';

    public function atendimento()
    {
        return $this->hasMany(atendimento::class, 'convenio_id');
    }
}
