@extends('template.member_depan.master')
@section('content')  
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="javascript:void(0)" rel="tooltip" title="Informatics Vocational Festival 2018 - Politeknik Harapan Bersama" data-placement="bottom">
                    <img src="{{ url('img/logo/invofest_logo_light.png') }}" alt="Logo Invofest 2018" style="width:40px;"> Invofest 2018
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="{{ url('img/blurred-image-1.jpg') }}">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('/#beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('/#section-acara') }}">Acara</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('timeline') }}">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('/#section-info') }}">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-outline-primary" rel="tooltip" onclick="location.href='{{ route('login') }}'" title="Silahkan masuk atau daftar" data-placement="bottom">
                            Masuk <i class="fa fa-sign-in"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="wrapper">

        <!-- section beranda -->
        <div id="beranda" class="page-header page">
            <div id="page-header-image" class="page-header-image" style="background-image: url('{{ url('img/header/header.jpg') }}');">
                <canvas id="demo-canvas"></canvas>
            </div>
            
            <div class="container">
                <div class="content-center">
                    <img src="{{ url('img/logo/invofest_logo.png') }}" alt="Logo Invofest 2018" style="width:25%;" class="wow pulse" data-wow-duration="1s" data-wow-delay="0s">
                    <h1 class="title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s" >INVOFEST <span style="font-weight: 100;">2018</span></h1>
                    <h5>Peran Pemuda Indonesia Dalam Mengembangkan Teknologi Informasi Di Era Disrupsi</h5>
                    <div class="text-center">
                        <a href="https://fb.com/invofest/" class="btn btn-primary btn-icon btn-round" >
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="https://www.instagram.com/invofest/" class="btn btn-primary btn-icon btn-round">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCdaOcNM5ndtr2NLtmB5XuTg" class="btn btn-primary btn-icon btn-round">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end section beranda -->

        <!-- section video -->
        <div id="section-video" class="section section-video">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow slideInLeft" data-wow-duration="1s" data-wow-delay="0s">
                        <div class="live-md">
                            <div class="behind-video"></div>
                            <iframe width="87%" src="https://www.youtube.com/embed/8o3t1_dQy2U" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
                        </div>
                        <div class="live-sm">
                            <iframe width="87%" src="https://www.youtube.com/embed/8o3t1_dQy2U" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-6 wow slideInRight" data-wow-duration="1s" data-wow-delay="0s">
                        <p style="margin-top:10%;">INVOFEST (Informatics Vocational Fstival) adalah suatu wadah untuk saling berbagi dan berinteraksi dalam sebuah pembelajaran yang mampu meningkatkan sumber pengetahuan bagi mahasiswa juga sebagai penghargaan atas keahlian dan karya yang mereka miliki.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end section video -->

        @include('umum.partials.section-acara')

        <!-- section-daftar -->
        <div id="section-daftar" class="section section-daftar text-center" style="background-image: url('{{ url('img/group/group1.png') }}');">
            <h2 class="wow tada" data-wow-duration="1s" data-wow-delay="0s">APA LAGI YANG KAMU TUNGGU ?</h2>
            <a href="#section-acara" class="btn btn-light wow pulse" data-wow-duration="1s" data-wow-delay="0.5s">DAFTAR SEKARANG</a>
        </div>
        <!-- end section daftar -->

        @include('umum.partials.section-informasi')

        <!-- section-foto -->
        <div id="section-foto" class="section section-foto" style="background-image: url('{{ url('img/group/group2.png') }}');">

        </div>
        <!-- end section-foto -->

        @include('member.partials._sponsor')
        @include('member.partials._media')
        @include('member.partials._maps')
    </div>
@endsection

@section('header-gerak-js')
    <script src="{{ url('js/header-gerak.js') }}"></script>
@endsection

@section('myscript')
    <script>
        function gotoNews(id){
            $("#formnews"+id).submit();
        }
    </script>
@endsection

