@extends('layouts.app')

@section('content')
    @include('layouts.headers.padrao')

    <div class="container-fluid mt--7">
            <div class="row"> 
                    <div class="col-xl-12 mb-5 mb-xl-0">
                        <div class="card shadow">
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                    <form action="" method="post">
                                        @csrf
                                    <input type="date" style="border:none;" class="date_atendimento_tela" id="dateLista" onchange="listaAtendimentos()" value="{{ $dataTela }}">
                                    </form>    
                                    </div>
                                    <div class="col text-right">
                                        <a href="#!" class="btn btn-sm btn-default" data-toggle="modal" data-target="#novoAtendimento">Novo Atendimento</a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <!-- Atendimentos table -->
   
                                <table class="table align-items-center table-flush text-uppercase">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Atendimento</th>
                                            <th scope="col">Paciente</th>
                                            <th scope="col">CPF</th>
                                            <th scope="col">DATA/HORA</th>
                                            <th scope="col">Médico</th>
                                            <th class="text-center" scope="col">Chegada</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($atendimentos as $atendimento)
                                            <tr>
                                                <th scope="row">
                                                    {{$atendimento->id}}
                                                </th>
                                                <td class="paciente">
                                                    {{$atendimento->paciente->nm_paciente}}
                                                </td>
                                                <td class="paciente">
                                                    {{$atendimento->paciente->cpf}}
                                                </td>
                                                <td>
                                                    {{date('H:i',strtotime($atendimento->hora_agendamento))}}
                                                </td>
                                                <td>
                                                    {{$atendimento->usuario->name}}
                                                </td>
                                                <td class="text-center cPointer">
                                                  <i class="fas fa-check-square" data-toggle="modal" data-target="#confirmarChegada" id="{{ $atendimento->id }}atend" onclick="nomePacienteConfirmaChegada(this)"></i>      
                                                </td>
                                                <td class="text-center cPointer"> 
                                                   <i class="fas fa-edit"></i>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <th scope="row" colspan="6">
                                                    Sem Resultados
                                                </th>
                                            </tr>
                                        @endforelse

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  
                </div>
        @include('layouts.footers.auth')
    </div>

    <!-- Modal novo Atendimento -->
    <div class="modal fade" id="novoAtendimento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Novo Atendimento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Primeiro pesquise se o paciente já tem cadastro.</p>
              <p><input type="text" name="" class="form-control" id="inputPesquisaPaciente" placeholder="cpf, rg, nome ou data de nascimento"></p>
              <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th  scope="col">Paciente</th>
                                <th  scope="col">CPF</th>
                                <th colspan="2" scope="col">Nascimento</th>
                            </tr>
                          
                                
                      
                        </thead>
                        <tbody id="retornoPacientes">
                            <tr>
                                <td>Sem resultados</td>
                            </tr>                         
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
  

      <!-- Modal confirmar chegada -->

      <div class="modal fade" id="confirmarChegada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="retornoNomePacChegada"></h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h2>Confirmar Chegada?</h2>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default">Confirmar</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('js')
@endpush