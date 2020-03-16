@extends('layouts.app')

@section('content')
@include('layouts.headers.padrao')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h3 class="mb-0">{{ __('Atendimento') }}</h3>
                            <span class="mb-0">{{ $nm_paciente[0]->nm_paciente ?? '' }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12 order-md-1">
                        <h4 class="mb-3">Informações da Consulta</h4>
                        <form method="post" action="{{ route('atendimento.store') }}" autocomplete="off">
                                @csrf
                            <div class="row">
                                <div class="col-md-2 mb-3">
                                    <label for="paciente_id">Paciente</label>
                                    <input type="text" class="form-control" name="paciente_id" placeholder="" value="{{$cd_paciente}}"
                                        hidden >
                                    <input type="text" class="form-control" placeholder="" value="{{$cd_paciente}}"
                                        disabled >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="dt_nascimento">Médico</label>
                                    <select class="custom-select d-block w-100" name="user_id_medico" required>
                                        <option value="">Escolha...</option>
                                        @forelse ($medicos as $medico)
                                            <option value="{{$medico->id}}">{{$medico->name}}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="especialidade">Especialidade</label>
                                    <select class="custom-select d-block w-100" name="especialidade" required>
                                        <option value="">Escolha...</option>
                                        @forelse ($especialidades as $especialidade)
                                            <option value="{{$especialidade->id}}">{{$especialidade->ds_especialidade}}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <h4 class="mb-3">Informações da data do atendimento</h4> 
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="data">Data</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control" id="dt_agendamento" name="dt_atendimento" placeholder="Selecione a Data" type="date" value="{{ now()->format('d/m/Y') }}">
                                        </div>
                                    </div>

                                </div>
                             <div class="col-md-4 mb-3">
                                <label for="horario">Horário</label>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" data-toggle="modal" id="btn_modal_horario" data-target="#horaAtendimento" ><i class="fas fa-clock"></i></span>
                                        </div>
                                        <input class="form-control" id="horarioSelecionadoPost" hidden name="hora_agendamento"  type="text" >
                                        <input class="form-control" id="horarioSelecionadoTela" disabled type="text" >
                                       
                                          
                                        </div>
                                        
                                </div>
                             </div>
                            </div>

                            <h4 class="mb-3">Informações do Plano</h4> 
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="carteira">Carteira</label>
                                    <input type="text" class="form-control" name="carteira" placeholder="" value=""
                                        >
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="ds_convenio">Convênio</label>
                                    <select class="custom-select d-block w-100" name="convenio_id" required>
                                            <option value="">Escolha...</option>
                                            @forelse ($convenios as $convenio)
                                                <option value="{{$convenio->id}}">{{$convenio->ds_convenio}}</option>
                                            @empty
                                                
                                            @endforelse
                                        </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="ds_plano">Plano</label>
                                    <input type="text" class="form-control" name="ds_plano" placeholder="" value=""
                                        >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <button class="btn btn-default btn-lg btn-block" type="submit">Confirmar Atendimento</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="horaAtendimento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Horário do Atendimento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            
             DIA: <div id="horarioSelecionadoTela">15</div>   
            
              <p>Selecione:</p>
              <div class="table-responsive">
              <table class="table align-items-center table-sm table-flush text-uppercase">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Hora</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="retornoHorarios">
                   
                </tbody>
                </table>  
              </div>          
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div> 
    @include('layouts.footers.auth')
</div>

@endsection

@push('js')
@endpush