@extends('template.member_depan.master')
@section('content')
    @include('member.partials._navbar')

    <div class="wrapper">

        <!-- section beranda -->
        <div id="beranda" class="page-header page-header-small">
            <div id="page-header-image" class="page-header-image" style="z-index:-1;background-image: url('{{ url('img/header/header.jpg') }}');" data-parallax="true"></div>
            
            <div class="container">
                <div class="content-center">
                    <h1 class="title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s" >WORKSHOP</h1>
                    <h5 class="wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.5s">UI/UX DESIGN, DATA SCIENCE, CYBER SECURITY &amp; WEB SERVICES</h5>
                </div>
            </div>
        </div>
        <!-- end section beranda -->

        <!-- section acara -->
        <div id="section-acara" class="section section-acara" style="background-image: url('{{ url('img/bg_sm.jpg') }}'); background-size:cover;">
            <div class="container-fluid">
                <h4 class="section-title text-center">Workshop Invofest 2018</h4>
                <div class="row justify-content-md-center">

                    <div class="col-sm-3 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="kotak-acara">
                            <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/workshop/uiux.png') }}" alt="UI/UX Design">
                            <h5 class="text-center">UI/UX DESIGN</h5>
                            <p class="ket-acara text-center">
                                {{
                                    str_limit('Salah satu sub kategori workshop Invofest 2018 di mana peserta akan mempelajari tren User Interface dan User Experience Design masa kini.', 100)
                                }}
                            </p>
                            <a href="{{ route('workshop.ui_ux') }}" class="btn btn-outline-primary btn-it">Info Lengkap</a>
                        </div>
                    </div>

                    <div class="col-sm-3 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                        <div class="kotak-acara">
                            <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/workshop/data-science.png') }}" alt="Data Science">
                            <h5 class="text-center">DATA SCIENCE</h5>
                            <p class="ket-acara text-center">
                                {{
                                    str_limit('Salah satu sub kategori workshop Invofest 2018 di mana peserta akan mempelajari perkembangan Data Science pada masa kini.', 100)
                                }}
                            </p>
                            <a href="{{ route('workshop.ds') }}" class="btn btn-outline-primary btn-it">Info Lengkap</a>
                        </div>
                    </div>

                    <div class="col-sm-3 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="kotak-acara">
                            <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/workshop/cyber-security.png') }}" alt="Cyber Security">
                            <h5 class="text-center">CYBER SECURITY</h5>
                            <p class="ket-acara text-center">
                                {{
                                    str_limit('Salah satu sub kategori workshop Invofest 2018 di mana peserta akan mempelajari tentang tren Cyber Security pada masa kini', 100)
                                }}
                            </p>
                            <a href="{{ route('workshop.cs') }}" class="btn btn-outline-primary btn-it">Info Lengkap</a>
                        </div>
                    </div>

                    <div class="col-sm-3 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="kotak-acara">
                            <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/workshop/web-services.png') }}" alt="Web Services">
                            <h5 class="text-center">WEB SERVICES</h5>
                            <p class="ket-acara text-center">
                                {{
                                    str_limit('Salah satu sub kategori workshop Invofest 2018 di mana peserta akan mempelajari tren Web Services masa kini.', 100)
                                }}
                            </p>
                            <a href="{{ route('workshop.ws') }}" class="btn btn-outline-primary btn-it">Info Lengkap</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end section acara -->

        @include('member.partials._sponsor')
        @include('member.partials._media')
    </div>   
@endsection