<?php

use Illuminate\Database\Seeder;
use App\Models\TipoUsuario;

class TipoUsuarioTableSeeder extends Seeder
{

    public function run()
    {
        $tipoUsuarios = [
            [
                'ds_tipo_usuario' => 'ADMINISTRADOR',
            ],
            [
                'ds_tipo_usuario' => 'RECEPCIONISTA',
            ],
            [
                'ds_tipo_usuario' => 'MEDICO',
            ],
        ];

        foreach ($tipoUsuarios as $tipoUsuario) {
            
            TipoUsuario::create($tipoUsuario);

        }
    }
}
