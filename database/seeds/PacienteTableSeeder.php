<?php

use Illuminate\Database\Seeder;
use App\Models\paciente;

class PacienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pacientes = [
            [
                'nm_paciente' => 'PACIENTE TESTE SISTEMA',
                'dt_nascimento' => now(),
                'cpf' => '101.507.864-84',
                'rg' => '8.550.270',
                'sexo' => 'M',
                'email' => 'SANTIAGO.MARLUS@GMAIL.COM', 
                'endereco' => 'ENDERECO TESTE', 
                'cidade' => 'CIDADE TESTE', 
                'bairro' => 'BAIRRO TESTE', 
                'complemento' => 'COMPLEMENTO TESTE',
                'cep' => '53.525-790', 
                'fone_primario' => '(81)998631089', 
            ],
        ];

        foreach ($pacientes as $paciente) {
            
            paciente::create($paciente);

        }
    }
}
