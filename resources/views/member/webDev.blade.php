@extends('template.member_depan.master')
@section('content')
    @include('member.partials._navbar')

    <div class="wrapper">

        <!-- section beranda -->
        <div id="beranda" class="page-header page-header-small">
            <div id="page-header-image" class="page-header-image" style="z-index:-1;background-image: url('{{ url('img/bg_sm2.jpg') }}');" data-parallax="true"></div>
            
            <div class="container">
                <div class="content-center">
                    <h2 class="title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s" >WEB DESIGN <br><span style="font-weight: 100;">COMPETITION</span></h2>
                    <h5 class="wow shake" data-wow-duration="1s" data-wow-delay="0.5s" style="color: #BA853A;font-weight:600;margin-bottom:3%;">Tema : “Innovative Apps for a Better Society”</h5>
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
                <p class="text-justify wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.75s">Application Development Competition 2018 adalah kompetisi pengembangan perangkat lunak sebagai salah satu kategori IT Competition yang diadakan oleh INVOFEST 2018 dan dapat diikuti oleh mahasiswa-mahasiswi diseluruh Indonesia. Tujuan diadakannya kompetisi ini adalah agar mahasiswa-mahasiswi di Indonesia mempunyai wadah untuk menuangkan ide-ide kreatif dan inovatif mereka di bidang pengembangan perangkat lunak yang diharapkan dapat memecahkan masalah dengan efektif dan memiliki dampak yang luas di masyarakat. Untuk kedepannya hasil akhir dari kompetisi ini agar dapat diimplementasikan secara riil serta mendukung perkembangan IT dan StartUp di Indonesia.</p>
                <br/><br/>

                <h5 class="wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1s">Timeline Lomba</h5>
                <br />
                <div class="row">
                    <div class="col-md-6 text-right wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="1s">
                        <h6>Pendaftaran Lomba</h6>
                        <p>Pendaftaran lomba dilakukan secara online melalui website Invofest pada tanggal <b>14 Juli – 1 September 2018</b></p>
                    </div>

                    <div class="col-md-6 offset-md-6 text-left wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1.25s">
                        <h6>Submisi Proposal dan Video</h6>
                        <p>Submisi Proposal untuk tahap seleksi menuju final dilaksanakan pada tanggal <b>Juli – 9 September 2018</b></p>
                    </div>

                    <div class="col-md-6 text-right wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="1.5s">
                        <h6>Pengumuman Finalis</h6>
                        <p>Pengumuman daftar peserta kompetisi Application Development Competition 2018 yang lolos ke tahap final diberitahukan pada tanggal <b>22 September 2018</b></p>
                    </div>

                    <div class="col-md-6 offset-md-6 text-left wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1.75s">
                        <h6>Final</h6>
                        <p>Babak final akan dilaksanakan di Kampus 1 Politeknik Harapan Bersama pada tanggal <b>26 Oktober 2018</b></p>
                    </div>
                </div>
                <br /><br />
                <h5 class="wow fadeInUp" data-wow-delay="0s" data-wow-duration="0.5s">Penghargaan</h5>
                <div class="row justify-content-center">
                    <div id="penghargaan" class="col-lg-3 col-md-4 text-center wow zoomIn" data-wow-duration="0.5s" data-wow-delay="1s" style="margin:2%;">
                        <img src="{{ url('img/icons/juara_1.svg') }}" alt="Juara I" width="50%" class="mx-auto d-block">
                        <h6>Juara I</h6>
                        <h5>Rp 3.000.000 ,-</h5>
                        <p>Sertifikat, Plakat, Hadiah Menarik</p>

                    </div>

                    <div id="penghargaan" class="col-lg-3 col-md-4 text-center wow zoomIn" data-wow-duration="0.5s" data-wow-delay="1.25s" style="margin:2%;">
                        <img src="{{ url('img/icons/juara_2.svg') }}" alt="Juara II" width="50%" class="mx-auto d-block">
                        <h6>Juara II</h6>
                        <h5>Rp 2.000.000 ,-</h5>
                        <p>Sertifikat, Plakat, Hadiah Menarik</p>

                    </div>

                    <div id="penghargaan" class="col-lg-3 col-md-4 text-center wow zoomIn" data-wow-duration="0.5s" data-wow-delay="1.5s" style="margin:2%;">
                        <img src="{{ url('img/icons/juara_3.svg') }}" alt="Juara III" width="50%" class="mx-auto d-block">
                        <h6>Juara III</h6>
                        <h5>Rp 1.000.000 ,-</h5>
                        <p>Sertifikat, Plakat, Hadiah Menarik</p>

                    </div>
                </div>
            </div>
        </div>


@endsection