@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid">
     

        @include('layouts.footers.auth')
    </div> 
@endsection

@push('js')
@endpush