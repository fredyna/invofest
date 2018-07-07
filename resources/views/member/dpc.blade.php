@extends('template.member_depan.master')
@section('content')
    @include('member.partials._navbar')

    <div class="wrapper">

        <!-- section beranda -->
        <div id="beranda" class="page-header page-header-small">
            <div id="page-header-image" class="page-header-image" style="z-index:-1;background-image: url('{{ url('img/bg_sm2.jpg') }}');" data-parallax="true"></div>
            
            <div class="container">
                <div class="content-center">
                    <h2 class="title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s" >DATABASE PROGRAMMING <br><span style="font-weight: 100;">COMPETITION</span></h2>
                    <div class="row justify-content-center">
                        <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-file-text"></i> Daftar</a> &nbsp;
                        <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-download"></i> Rule Book</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end section beranda -->

        <!-- section deskripsi -->
        <div class="section section-deskripsi">
            <div class="container">
                <h4 class="section-title text-center wow bounceInDown" data-wow-duration="0.5s" data-wow-delay="0s">Deskripsi Lomba</h4>

                <h5 class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">Penjelasan Umum</h5>
                <p class="text-justify wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.75s">
                    Database Programming Competition 2018 merupakan salah satu kategori IT Competition pada event INVOFEST 2018 (Informatics Vocational Festival 2018) yang diselenggarakan oleh Program Studi DIV Teknik Informatika Politeknik Harapan Bersama. Database Programming Competition 2018 adalah kompetisi database programming yang dapat diikuti oleh mahasiswa-mahasiswi diseluruh Indonesia. Peserta Database Programming Competition 2018 berlomba adu skill atau kemampuan yang dimiliki untuk memecahkan suatu permasalahan dengan menggunakan database programming.
                </p>
                <br/><br/>

                <h5 class="wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1s">Timeline Lomba</h5>
                <br />
                <div class="row">
                    <div class="col-md-6 text-right wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="1s">
                        <h6>Pendaftaran Lomba</h6>
                        <p>Pendaftaran lomba dilakukan secara online melalui website Invofest pada tanggal <b>14 Juli – 1 September 2018</b></p>
                    </div>

                    <div class="col-md-6 offset-md-6 text-left wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1.25s">
                        <h6>Tahap Penyisian</h6>
                        <p>Tahap penyisihan dilakukan on site Kampus 1 Politeknik Harapan Bersama pada tanggal <b>26 Oktober 2018</b></p>
                    </div>
                </div>
                <br /><br />
                <h5 class="wow fadeInUp" data-wow-delay="0s" data-wow-duration="0.5s">Penghargaan</h5>
                <div class="row justify-content-center">
                    <div id="penghargaan" class="col-lg-3 col-md-4 text-center wow zoomIn" data-wow-duration="0.5s" data-wow-delay="1s" style="margin:2%;">
                        <img src="{{ url('img/icons/juara_1.svg') }}" alt="Juara I" width="50%" class="mx-auto d-block">
                        <h6>Juara I</h6>
                        <h5>Rp 1.000.000 ,-</h5>
                        <p>Sertifikat, Plakat, Hadiah Menarik</p>

                    </div>

                    <div id="penghargaan" class="col-lg-3 col-md-4 text-center wow zoomIn" data-wow-duration="0.5s" data-wow-delay="1.25s" style="margin:2%;">
                        <img src="{{ url('img/icons/juara_2.svg') }}" alt="Juara II" width="50%" class="mx-auto d-block">
                        <h6>Juara II</h6>
                        <h5>Rp 750.000 ,-</h5>
                        <p>Sertifikat, Plakat, Hadiah Menarik</p>

                    </div>

                    <div id="penghargaan" class="col-lg-3 col-md-4 text-center wow zoomIn" data-wow-duration="0.5s" data-wow-delay="1.5s" style="margin:2%;">
                        <img src="{{ url('img/icons/juara_3.svg') }}" alt="Juara III" width="50%" class="mx-auto d-block">
                        <h6>Juara III</h6>
                        <h5>Rp 500.000 ,-</h5>
                        <p>Sertifikat, Plakat, Hadiah Menarik</p>

                    </div>
                </div>
                <br /><br />
                
                <h5 class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">Contact Person</h5>
            </div>
        </div>

@endsection