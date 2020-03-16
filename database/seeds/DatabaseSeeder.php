<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                TipoUsuarioTableSeeder::class,
                UsersTableSeeder::class, 
                EspecialidadeTableSeeder::class,
                PacienteTableSeeder::class,
                EscalaTableSeeder::class,
                ConvenioTableSeeder::Class,
                AtendimentoTableSeeder::class,
                
            ]
        );
    }
}
