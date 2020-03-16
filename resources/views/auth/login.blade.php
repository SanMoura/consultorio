@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
              
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>
                                    <a class="navbar-brand pt-0" href="{{ route('home') }}">
                                            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
                                        </a>
                            </small>
                            <br>
                        </div>
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" value="" required autofocus>
                                </div>
                               
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" value="secret" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                          
                            <div class="text-center">
                                <button type="submit" class="btn btn-default my-4">{{ __('Entrar') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
@endsection
