<?php

use Illuminate\Database\Seeder;
use App\Models\atendimento;

class AtendimentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $atendimentos = [
            [
                'paciente_id' => 1,
                'dt_atendimento' => now(),
                'dt_atendimento' => date('Y-m-d', strtotime(now())),
                'user_id_medico' => 2,
                'convenio_id' => 1,
                'hora_agendamento' => '11:00'
            ],
        ];

        foreach ($atendimentos as $atendimento) {
            
            atendimento::create($atendimento);

        }
    }
}
