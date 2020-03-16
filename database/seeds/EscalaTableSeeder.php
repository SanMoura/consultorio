<?php

use Illuminate\Database\Seeder;
use App\Models\Escala;

class EscalaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $atendimentosDia = [
            [
                'user_id' => 2 ,
                'qtdAtendimentosDia' => 40,
            ],
        ];

        foreach ($atendimentosDia as $atendimentoDia) {
            
            Escala::create($atendimentoDia);

        }
    }
}
