@extends('template.member_depan.master')
@section('content')
    @include('member.partials._navbar')

    <div class="wrapper">

        <!-- section beranda -->
        <div id="beranda" class="page-header page-header-small">
            <div id="page-header-image" class="page-header-image" style="z-index:-1;background-image: url('{{ url('img/header/header.jpg') }}');" data-parallax="true"></div>
            
            <div class="container">
                <div class="content-center">
                    <h1 class="title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s" >IT <span style="font-weight: 100;">COMPETITION</span></h1>
                    <h5 class="wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.5s">APPLICATION DEVELOPMENT COMPETITION, WEB DESIGN COMPETITION, DATABASE PROGRAMMING COMPETITION</h5>
                </div>
            </div>
        </div>
        <!-- end section beranda -->

        <!-- section acara -->
        <div id="section-acara" class="section section-acara" style="background-image: url('{{ url('img/bg_sm.jpg') }}');">
            <div class="container-fluid">
                <h4 class="section-title text-center">IT Competition Invofest 2018</h4>
                <div class="row justify-content-md-center">
                    <div class="col-sm-4 col-md-4 col-lg-3 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="kotak-acara">
                            <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/app-development.png') }}" alt="APP DEV">
                            <h5 class="text-center">APPLICATION DEVELOPMENT COMPETITION</h5>
                            <p class="ket-acara text-center">Laborum nostrud pariatur consectetur minim ad elit Lorem consequat veniam duis veniam nostrud ex.</p>
                            <a href="{{ url('/itcompetition/adc') }}" class="btn btn-outline-primary btn-it">Info Lengkap</a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-3 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                        <div class="kotak-acara">
                            <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/web-design.png') }}" alt="WEB DEV">
                            <h5 class="text-center">WEB DESIGN COMPETITION</h5>
                            <p class="ket-acara text-center">Laborum nostrud pariatur consectetur minim ad elit Lorem consequat veniam duis veniam nostrud ex.</p>
                            <a href="{{ url('/itcompetition/wdc') }}" class="btn btn-outline-primary btn-it">Info Lengkap</a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-3 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="kotak-acara">
                            <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/database-programming.png') }}" alt="DATABASE">
                            <h5 class="text-center">DATABASE PROGRAMMING COMPETITION</h5>
                            <p class="ket-acara text-center">Laborum nostrud pariatur consectetur minim ad elit Lorem consequat veniam duis veniam nostrud ex.</p>
                            <a href="{{ url('/itcompetition/dpc') }}" class="btn btn-outline-primary btn-it">Info Lengkap</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end section acara -->

        @include('member.partials._sponsor')
@endsection