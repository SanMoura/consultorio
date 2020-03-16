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
                            <h3 class="mb-0">{{ __('Novo Paciente') }}</h3>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-12">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="alert-inner--text">{{ $error }}</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>   
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12 order-md-1">
                        <h4 class="mb-3">Informações Pessoais</h4>
                        <form method="post" action="{{ route('pacientes.store') }}" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-9 mb-3">
                                    <label for="nm_paciente">Nome</label>
                                    <input type="text" class="form-control" name="nm_paciente" placeholder="" value="{{ old('nm_paciente') }}"
                                        required>

                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="dt_nascimento">Data de Nascimento</label>
                                    <input type="date" class="form-control" name="dt_nascimento" placeholder="" value="{{ old('dt_nascimento') }}"
                                        required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="CPF">CPF</label>
                                    <input type="text" class="form-control cpf" name="cpf" placeholder="" value="{{ old('cpf') }}" required>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="rg">RG</label>
                                    <input type="text" class="form-control" name="rg" placeholder="" value="{{ old('rg') }}" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="sexo">Sexo</label>
                                    <select class="custom-select d-block w-100" name="sexo" required>
                                        <option value="">Escolha...</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                        <option value="O">Outro</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="email">Email <span class="text-muted">(Opcional)</span></label>
                                    <input type="email" class="form-control" name="email" placeholder="" value="{{ old('email') }}"
                                        >

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="fone_primario">Celular</label>
                                    <input type="text" class="form-control" name="fone_primario" placeholder="" value="{{ old('fone_primario') }}"
                                        >
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="fone_secundario">Outro Telefone <span
                                            class="text-muted">(Opcional)</span></label>
                                    <input type="text" class="form-control" name="fone_secundario" placeholder=""
                                    value="{{ old('fone_secundario') }}">
                                </div>
                            </div>

                            <h4 class="mb-3">Informações Demográficas</h4>
                            <div class="row">
                                <div class="col-md-3 mb-3"> </label>
                                    <label for="cep">CEP</label> <span class="text-muted">(Só números)</span>
                                    <input type="text" class="form-control cep" name="cep" placeholder="" value="{{ old('cep') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" class="form-control endereco" name="endereco" placeholder="" value="{{ old('endereco') }}"
                                        required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="cidade">Cidade </label>
                                    <input type="text" class="form-control cidade" name="cidade" placeholder="" value="{{ old('cidade') }}"
                                        required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" class="form-control bairro" name="bairro" placeholder="" value="{{ old('bairro') }}"
                                        required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="complemento">Complemento <span
                                            class="text-muted">(Opcional)</span></label>
                                    <input type="text" class="form-control complemento" name="complemento" placeholder="" value="{{ old('complemento') }}"
                                        >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <button class="btn btn-default btn-lg btn-block" type="submit">Continuar para o
                                        Atendimento</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('layouts.footers.auth')
</div>

@endsection

@push('js')
@endpush