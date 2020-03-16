
@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('layouts.headers.padrao')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Escalas Medicas</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Nome') }}</th>
                                    <th scope="col">{{ __('Quantidade de Atendimentos / dia') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($escalas as $escala)
                                    <tr>
                                        <td>{{ $escala->usuario->name }}</td>
                                        <td><input type="number" class="form-control input-sm" name="qtdAtendimentosDia" value="{{ $escala->qtdAtendimentosDia }}"></td>
                                        <td><button type="submit" class="btn btn-default">Alterar</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="row ml-2">
                        <div class="col-12">
                            {{$escalas -> links()}}
                        </div>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                        
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection