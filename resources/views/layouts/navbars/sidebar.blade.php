<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('DashBoard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#consultorio" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="consultorio">
                        <i class="fas fa-home" style="color: #192D4E;"></i>
                        <span class="nav-link-text" style="color: #192D4E;">{{ __('Consultório') }}</span>
                    </a>

                    <div class="collapse" id="consultorio">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('atendimento.index') }}">
                                    {{ __('Atendimento') }}
                                </a>
                            </li>
                           <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('User Management') }}
                                </a>
                            </li>-->
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#configuracoes" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="configuracoes">
                        <i class="fas fa-cog" style="color: #192D4E;"></i>
                        <span class="nav-link-text" style="color: #192D4E;">{{ __('Configurações') }}</span>
                    </a>

                    <div class="collapse " id="configuracoes">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('Usuários') }}
                                </a>
                            </li>
                           <li class="nav-item">
                                <a class="nav-link" href="{{ route('escala.index') }}">
                                    {{ __('Escalas Médicas') }}
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
           
        </div>
    </div>
</nav>