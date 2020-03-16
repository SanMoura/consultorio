<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {

        $usuarios = [
            [
                'name' => 'ADMINISTRADOR',
                'email' => 'santiago.marlus@gmail.com',
                'password' => Hash::make('admin'),
                'tipo_usuario_id' => 1,
            ],
            [
                'name' => 'MEDICO TESTE',
                'email' => 'MEDICO@CONSULTORIO.COM',
                'password' => Hash::make('medico'),
                'tipo_usuario_id' => 3,
            ],
        ];

        foreach ($usuarios as $usuario) {
            
            User::create($usuario);

        }
    }
    
}
