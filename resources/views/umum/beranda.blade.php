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
                        <a class="nav-link" href="javascript:void(0)">Jadwal</a>
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
                    <h5>Peran Pemuda Indonesia Dalam Mengembangkan Teknologi Informasi Di Era Digital</h5>
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
                            <video width="90%" controls>
                                <source src="trailer.mp4" type="video/mp4">
                                Browser Anda tidak mendukung HTML 5.
                            </video>
                        </div>
                        <div class="live-sm">
                            <video width="90%" controls>
                                <source src="trailer.mp4" type="video/mp4">
                                Browser Anda tidak mendukung HTML 5.
                            </video>
                        </div>
                    </div>
                    <div class="col-md-6 wow slideInRight" data-wow-duration="1s" data-wow-delay="0s">
                        <p style="margin-top:10%;">INFOVEST (Informatics Vocational Fstival) adalah suatu wadah untuk saling berbagi dan berinteraksi dalam sebuah pembelajaran yang mampu meningkatkan sumber pengetahuan bagi mahasiswa juga sebagai penghargaan atas keahlian dan karya yang mereka miliki.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end section video -->

        <!-- section acara -->
        <div id="section-acara" class="section section-acara" style="background-image: url('{{ url('img/background.jpg') }}');">
            <div class="container-fluid">
                <h4 class="section-title text-center">Rangkaian Acara Invofest</h4>
                <div class="row">
                    <div class="col-md-6 col-lg-3 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="kotak-acara">
                            <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/microphone.png') }}" alt="TALKSHOW">
                            <h5 class="text-center">TALKSHOW</h5>
                            <p class="ket-acara text-center">Talkshow interaktif dengan tema Big Data &amp; Machine Learning</p>
                            <a href="{{ route('talkshow') }}" class="btn btn-outline-primary">Info Lengkap</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0s">
                        <div class="kotak-acara">
                            <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/student.png') }}" alt="WORKSHOP">
                            <h5 class="text-center">WORKSHOP</h5>
                            <p class="ket-acara text-center">Workshop IT : UI/UX Design, Data Science, Cyber Security, dan Web Services</p>
                            <a href="{{ route('workshop') }}" class="btn btn-outline-primary">Info Lengkap</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0s">
                        <div class="kotak-acara">
                            <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/presentation.png') }}" alt="SEMINAR">
                            <h5 class="text-center">SEMINAR NASIONAL</h5>
                            <p class="ket-acara text-center">Seminar nasional dengan tema Artificial Intelegence dalam Transformasi Teknologi Industri Masa Depan</p>
                            <a href="{{ route('seminar') }}" class="btn btn-outline-primary">Info Lengkap</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="kotak-acara">
                            <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/trophy.png') }}" alt="COMPETITION">
                            <h5 class="text-center">IT COMPETITION</h5>
                            <p class="ket-acara text-center">Kompetisi IT : Application Development, Web Design, dan Database Programming untuk pelajar dan mahasiswa tingkat nasional</p>
                            <a href="{{ url('/itcompetition') }}" class="btn btn-outline-primary">Info Lengkap</a>
                        </div>
                    </div>
                </div>

                <div id="pembicara-pemateri">
                    <div class="row judul-pemateri">
                        <div class="col-sm-3">
                            <h5 class="section-title text-center">Pembicara &amp; Pemateri</h5>
                        </div>
                        <div id="garis" class="col-sm-9">
                            <hr style="height: 3px;background-color: #BA853A;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 pemateri-left wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <img src="{{ url('img/tokoh/richardus.png') }}" alt="Richardus" class="img-fluid mx-auto d-block" width="150" height="150">
                            <h6 class="text-center">Prof. Dr. Ir. Richardus Eko Indrajit M.Sc., M.B.A., M.Phil., M.A.</h6>
                            <p class="text-center">First Chairman ID-SIRTII</p>
                        </div>
                        <div class="col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                            <img src="{{ url('img/tokoh/peter.png') }}" alt="Peter" class="img-fluid mx-auto d-block" width="150" height="150">
                            <h6 class="text-center">Peter Jack Kambey</h6>
                            <p class="text-center">IT Manager Titan Baking</p>
                        </div>
                        <div class="col-md-4 pemateri-right wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <img src="{{ url('img/tokoh/alamsyah.png') }}" alt="Alamsyah" class="img-fluid mx-auto d-block" width="150" height="150">
                            <h6 class="text-center">Alamsyah Hanza</h6>
                            <p class="text-center">Business Intelligence Analyst at GO-JEK</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="1s">
                            <img src="{{ url('img/tokoh/afnizar.png') }}" alt="Afnizar" class="img-fluid mx-auto d-block" width="150" height="150">
                            <h6 class="text-center">Afnizar Nur Ghifari</h6>
                            <p class="text-center">UX Designer at Bukalapak</p>
                        </div>
                        <div class="col-md-3 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="1s">
                            <img src="{{ url('img/tokoh/farah.png') }}" alt="Farah" class="img-fluid mx-auto d-block" width="150" height="150">
                            <h6 class="text-center">Farah Luthfi Oktarina</h6>
                            <p class="text-center">Trainer &amp; Crew Member at FemaleGeek Indonesia</p>
                        </div>
                        <div class="col-md-3 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1s">
                            <img src="{{ url('img/tokoh/yahya.png') }}" alt="Yahya" class="img-fluid mx-auto d-block" width="150" height="150">
                            <h6 class="text-center">Yahya Al-Fatih</h6>
                            <p class="text-center">CTO at Crowde.co</p>
                        </div>
                        <div class="col-md-3 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1s">
                            <img src="{{ url('img/tokoh/ahmad.png') }}" alt="Ahmad" class="img-fluid mx-auto d-block" width="150" height="150">
                            <h6 class="text-center">Ahmad Ilham</h6>
                            <p class="text-center">Koordinator Data Science Indonesia Chapter Jawa Tengah</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- end section acara -->

        <!-- section-daftar -->
        <div id="section-daftar" class="section section-daftar text-center" style="background-image: url('{{ url('img/group/group1.png') }}');">
            <h2 class="wow tada" data-wow-duration="1s" data-wow-delay="0s">APA LAGI YANG KAMU TUNGGU ?</h2>
            <a href="#section-acara" class="btn btn-light wow pulse" data-wow-duration="1s" data-wow-delay="0.5s">DAFTAR SEKARANG</a>
        </div>
        <!-- end section daftar -->

        <!-- section informasi -->
        <div id="section-info" class="section section-info" style="background-image: url('{{ url('img/background.jpg') }}');">
            <h4 class="section-title text-center">Informasi</h4>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0s">
                        <div class="card">
                            <img class="card-img-top" src="{{ url('img/info/web-design-2038872_1920.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">Pembukaan Invofest Akan Dihadiri Walikota Tegal</h5>
                            <p class="card-text">Walikota Tegal akan hadir untuk membuka acara Invofest 2018. Beliau hadir bersama tamu undangan lainnya</p>
                            <a href="#">Baca Selengkapnya <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="card">
                            <img class="card-img-top" src="{{ url('img/info/web-design-2038872_1920.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">Pemateri Talkshow: Peter Jack Kambey</h5>
                            <p class="card-text">Peter Jack Kambey hadir untuk mengisi acara Talkshow Interaktif pada acara Invofest 2018. Tema yang akan dibahas berkaitan dengan Data Science</p>
                            <a href="#">Baca Selengkapnya <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1s">
                        <div class="card">
                            <img class="card-img-top" src="{{ url('img/info/web-design-2038872_1920.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">Artificial Intellegence Tema Invofest Tahun 2018</h5>
                            <p class="card-text">Artificial Intellegence, teknologi baru berkembang pesat. Memanfaatkan kecerdasan buatan untuk menyelesaikan permasalahan</p>
                            <a href="#">Baca Selengkapnya <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>    
                </div>

                <div class="text-center lihat-lainnya">
                    <a href="javascript:void(0)" class="btn btn-outline-light" >LIHAT LAINNYA</a>
                </div>
            </div>
        </div>
        <!-- end section informasi -->

        <!-- section-foto -->
        <div id="section-foto" class="section section-foto" style="background-image: url('{{ url('img/group/group2.png') }}');">

        </div>
        <!-- end section-foto -->

        @include('member.partials._sponsor')
@endsection