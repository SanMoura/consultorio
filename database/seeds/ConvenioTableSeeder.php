<?php

use Illuminate\Database\Seeder;
use App\Models\Convenio;

class ConvenioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $convenios = [
            [
                'ds_convenio' => 'UNIMED RECIFE',
            ],
        ];

        foreach ($convenios as $convenio) {
            
            Convenio::create($convenio);

        }
    }
}
