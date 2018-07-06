@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Halaman Member</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @empty($user)
                        <p>hai</p>
                    @endempty

                    @isset($user)
                        <p>ada</p>
                    @endisset
                    
                    <div id="kompetisi" class="row justify-content-md-center">
                        <div class="col-md-4 kompetisi wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="kotak-acara">
                                <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/app-development.png') }}" alt="APP DEV">
                                <h5 class="text-center">APPLICATION DEVELOPMENT COMPETITION</h5>
                                <a href="{{ url('/itcompetition/adc') }}" class="btn btn-outline-primary btn-it">Daftar</a>
                            </div>
                        </div>
                        <div class="col-md-4 kompetisi wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                            <div class="kotak-acara">
                                <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/web-design.png') }}" alt="WEB DEV">
                                <h5 class="text-center">WEB DESIGN COMPETITION</h5>
                                <a href="{{ url('/itcompetition/wdc') }}" class="btn btn-outline-primary btn-it">Daftar</a>
                            </div>
                        </div>
                        <div class="col-md-4 kompetisi wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="kotak-acara">
                                <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/database-programming.png') }}" alt="DATABASE">
                                <h5 class="text-center">DATABASE PROGRAMMING COMPETITION</h5>
                                <a href="{{ url('/itcompetition/dpc') }}" class="btn btn-outline-primary btn-it">Daftar</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
