<?php

namespace App\Http\Controllers\recepcao\atendimento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\atendimento;
use App\Models\Especialidade;
use App\Models\Convenio;
use App\Models\paciente;
use App\User;

class AtendimentoController extends Controller
{
    public function index(){
        $ds_pagina = 'CONSULTÓRIO > ATENDIMENTO';

        $data = date('d/m/Y');

        $atendimentos = atendimento::where('dt_alta', null)
                                    ->where('dt_atendimento', '=' ,date('Y/m/d'))
                                    ->with('paciente')
                                    ->with('usuario')
                                    ->with('convenio')
                                    ->get();

        return view('recepcao.atendimento.atendimento', compact('atendimentos', 'ds_pagina', 'data'));
    }

    public function create(atendimento $atendimentos){
        $ds_pagina = 'CONSULTÓRIO > ATENDIMENTO > PACIENTE > ATENDER';
        $cd_paciente = $_GET['paciente'];

        $nm_paciente = Paciente::where('id',$cd_paciente)
        ->get();

        $diasOcupados = atendimento::where('paciente_id',$cd_paciente)
            ->where('dt_alta',null)   
            ->where('dt_atendimento',date('Y-d-m'))                                
            ->get();

        $especialidades = Especialidade::where('ativo',1)
                                       ->get();

        $convenios = Convenio::where('ativo',1)
        ->get();                                       

        $medicos = User::where('tipo_usuario_id',3)
                        ->get();

        return view('recepcao.atendimento.atender', compact('ds_pagina', 'diasOcupados','cd_paciente','nm_paciente', 'especialidades', 'medicos', 'convenios'));
    }

    public function editar(Request $request){
        $ds_pagina = 'CONSULTÓRIO > ATENDIMENTO > PACIENTE > EDITAR ATENDIMENTO';
        $cd_paciente = 1;

        $atendimento = $request->only('atendimento');

        $nm_paciente = Paciente::where('id',$cd_paciente)
                                ->get();

        $especialidades = Especialidade::where('ativo',1)
                                       ->get();

        $medicos = User::where('tipo_usuario_id',3)
                        ->get();

        return view('recepcao.atendimento.atender', compact('ds_pagina','cd_paciente','nm_paciente', 'especialidades', 'medicos'));
    }

    public function exibeHorariosAtendimento(Request $request){
        $data = $request->only('dia');
        
        $horarios = atendimento::select('hora_agendamento','paciente_id')
        ->where('dt_atendimento',$data['dia'])
        ->with('paciente')
        ->get();

        function convertToHoursMins($time, $format = '%02d:%02d') {
            if ($time < 1) {
                return;
            }
            $hours = floor($time / 60);
            $minutes = ($time % 60);
            return sprintf($format, $hours, $minutes);
        }

        $hf = 17 * 60;
        $hi = 8 * 60;
        $tpa = 30;
        $cont = 0;
        
        
        if ($data['dia'] < date("Y-m-d")){
            $check = 'red';
            $mensagem = 'INDISPONÍVEL';    
            $selecionar = 0;
        }elseif($data['dia'] >= date("Y-m-d")){
            $mensagem = date('H:i');
            $check = 'green';
            $selecionar = 1;
        }
        

        for ($i = $hi; $i < $hf;){

            foreach ($horarios as $horario) {
                
                    if ($horario->hora_agendamento == convertToHoursMins($i)){
                        $cont = 1;
                        $nm_paciente = $horario->paciente->nm_paciente;  
                        break;
                    }else{
                        $cont = 0;  
                    }

                    if (convertToHoursMins($i) < date('H:i')){
                        $mensagem = 'INDISPONÍVEL';  
                        $selecionar = 0;  
                        $check = 'red';
                    }else{
                        $mensagem = 'LIVRE';
                        $selecionar = 1;
                        $check = 'green';
                    }
                }   
            
            if ($cont == 1){
                echo '<tr><td> '.convertToHoursMins($i).' </td>
                <td> '.$nm_paciente.' </td>
                <td> <i class="fas fa-check-square" style="color:red;"></i> </td>
                </tr>';
            }else{
                if ($selecionar == 1){
                    $fnc = 'style="cursor:pointer;"  onclick="selectHorario(this)"';
                }else{
                    $fnc = '';
                }
                echo '<tr '.$fnc.' id="'.convertToHoursMins($i) .'" ><td > '.date('H:i',strtotime(convertToHoursMins($i))).' </td>
                <td> '.$mensagem.' </td>
                <td> <i class="fas fa-check-square" style="color:'.$check.';"></i> </td>
                </tr>';
            }
            $i = $i + $tpa;
        }
        
    }

    public function store(request $request ,atendimento $atendimento){
        $formAtendimento = $request->only([
            'paciente_id',
            'dt_atendimento',
            'user_id_medico',
            'carteira',
            'convenio_id',
            'ds_plano',
            'hora_agendamento'
        ]);


        $insert = $atendimento->create(
            $formAtendimento
        );
        
        return redirect()->route('atendimento.index');
    }
}
