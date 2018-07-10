@extends('layouts.app')

@section('mycss')
    <style>
        .alert span.p-black {
            color: #000;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6>Halaman Member</h6>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('member.partials._cekAlurDaftar')

                    @if (isset($user) && $user->id != null)
                        @if ($user->jenis_lomba == 'adc')

                            <p>Anda / Tim Anda telah terdaftar pada kompetisi : </p>
                            <div id="kompetisi" class="row justify-content-md-center">
                                <div class="col-md-4 kompetisi wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.5s">
                                    <div class="kotak-acara">
                                        <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/app-development.png') }}" alt="APP DEV">
                                        <h5 class="text-center">APPLICATION DEVELOPMENT COMPETITION</h5>
                                        <a href="{{ url('member/isidata/adc') }}" class="btn btn-outline-primary btn-it">Lihat Data</a>
                                    </div>
                                </div>
                            </div>

                        @elseif($user->jenis_lomba == 'wdc')

                            <p>Anda / Tim Anda telah terdaftar pada kompetisi : </p>
                            <div id="kompetisi" class="row justify-content-md-center">
                                <div class="col-md-4 kompetisi wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                                    <div class="kotak-acara">
                                        <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/web-design.png') }}" alt="WEB DEV">
                                        <h5 class="text-center">WEB DESIGN COMPETITION</h5>
                                        <a href="{{ url('member/isidata/wdc') }}" class="btn btn-outline-primary btn-it">Lihat Data</a>
                                    </div>
                                </div>
                            </div>

                        @elseif($user->jenis_lomba == 'dpc')
                            <p>Anda / Tim Anda telah terdaftar pada kompetisi : </p>
                            <div id="kompetisi" class="row justify-content-md-center">
                                <div class="col-md-4 kompetisi wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
                                    <div class="kotak-acara">
                                        <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/database-programming.png') }}" alt="DATABASE">
                                        <h5 class="text-center">DATABASE PROGRAMMING COMPETITION</h5>
                                        <a href="{{ url('member/isidata/dpc') }}" class="btn btn-outline-primary btn-it">Lihat Data</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <p>Silahkan pilih salah satu kompetisi yang akan diikuti di bawah ini :</p>
                        <div id="kompetisi" class="row justify-content-md-center">
                            <div class="col-md-4 kompetisi wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.5s">
                                <div class="kotak-acara">
                                    <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/app-development.png') }}" alt="APP DEV">
                                    <h5 class="text-center">APPLICATION DEVELOPMENT COMPETITION</h5>
                                    <a href="{{ url('/member/isidata/adc') }}" class="btn btn-outline-primary btn-it">Daftar</a>
                                </div>
                            </div>
                            <div class="col-md-4 kompetisi wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                                <div class="kotak-acara">
                                    <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/web-design.png') }}" alt="WEB DEV">
                                    <h5 class="text-center">WEB DESIGN COMPETITION</h5>
                                    <a href="{{ url('member/isidata/wdc') }}" class="btn btn-outline-primary btn-it">Daftar</a>
                                </div>
                            </div>
                            <div class="col-md-4 kompetisi wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
                                <div class="kotak-acara">
                                    <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/database-programming.png') }}" alt="DATABASE">
                                    <h5 class="text-center">DATABASE PROGRAMMING COMPETITION</h5>
                                    <a href="{{ url('member/isidata/dpc') }}" class="btn btn-outline-primary btn-it">Daftar</a>
                                </div>
                            </div>
                        </div>  

                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
