<?php

use Illuminate\Database\Seeder;
use App\Models\Especialidade;

class EspecialidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $especialidades = [
            [
                'ds_especialidade' => 'OBSTETRICIA',
            ],
        ];

        foreach ($especialidades as $especialidade) {
            
            Especialidade::create($especialidade);

        }
    }
}
