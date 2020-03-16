<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Escala extends Model
{
    protected $table = 'escala';

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}


