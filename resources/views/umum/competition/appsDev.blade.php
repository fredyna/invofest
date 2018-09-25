@extends('template.member_depan.master')
@section('content')
    @include('member.partials._navbar')

    <div class="wrapper">

        <!-- section beranda -->
        <div id="beranda" class="page-header page-header-small">
            <div id="page-header-image" class="page-header-image" style="z-index:-1;background-image: url('{{ url('img/bg_sm2.jpg') }}');" data-parallax="true"></div>
            
            <div class="container">
                <div class="content-center">
                    <h2 class="title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s" >APPLICATION DEVELOPMENT <br><span style="font-weight: 100;">COMPETITION</span></h2>
                    <h5 class="wow shake" data-wow-duration="1s" data-wow-delay="0.5s" style="color: #BA853A;font-weight:600;margin-bottom:3%;">Tema : “Innovative Apps for a Better Society”</h5>
                    <div class="row justify-content-center">
                        <a href="{{ route('register') }}" class="btn btn-primary"><i class="fa fa-file-text"></i> Daftar</a> &nbsp;
                        <a href="https://drive.google.com/open?id=15YvgZuH6JZVfnVtwZfJkH_V5zv6YqGZ8" class="btn btn-info"><i class="fa fa-download"></i> Rule Book</a> &nbsp;
                        <a href="{{ url('gambar/CoverAppDevInvofest2018.jpg') }}" class="btn btn-primary"><i class="fa fa-download"></i> Cover Video</a>
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
                        <p>Pendaftaran lomba dilakukan secara online melalui website Invofest pada tanggal <b>1 Agustus – <span style="text-decoration: line-through;">1 September 2018</span> 12 September 2018</b></p>
                    </div>

                    <div class="col-md-6 offset-md-6 text-left wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1.25s">
                        <h6>Submisi Proposal</h6>
                        <p>Submisi Proposal untuk tahap seleksi menuju final dilaksanakan pada tanggal <b>1 Agustus - <span style="text-decoration: line-through;">8 September 2018</span> 13 September 2018</b></p>
                    </div>

                    <div class="col-md-6 text-right wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="1.5s">
                        <h6>Pengumuman Semifinalis</h6>
                        <p>Pengumuman peserta lolos submisi proposal pada tanggal <b><span style="text-decoration: line-through;">10 September 2018</span> 14 September 2018</b></p>
                    </div>

                    <div class="col-md-6 offset-md-6 text-left wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1.75s">
                        <h6>Submisi Aplikasi dan Video</h6>
                        <p>Batas akhir submisi pengumpulan aplikasi yang dikembangkan dan video secara onlline pada <b><span style="text-decoration: line-through;">10 September 2018</span> 15 September - 15 Oktober 2018</b></p>
                    </div>

                    <div class="col-md-6 text-right wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="2s">
                        <h6>Pengumuman Finalis</h6>
                        <p>Pengumuman peserta lolos ke tahap final pada <b>20 Oktober 2018</b></p>
                    </div>

                    <div class="col-md-6 offset-md-6 text-left wow fadeInRight" data-wow-duration="1s" data-wow-delay="2.25s">
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
                <br /><br />

                <h5 class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">Info Registrasi</h5>
                <table class="wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.75s">
                    <tr>
                        <td style="width:150px;">Biaya Registrasi</td>
                        <td> : Rp 150.000,- / tim</td>
                    </tr>
                </table>
                <br />
                <p class="wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.5s">Pembayaran via transfer :<br /> <br/>
                    No Rekening <b>6072-01-015533-53-2</b> <br />
                    a/n Fauziah Nur Rahmawati (BRI)</p>
                <p class="wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.6s">Konfirmasi Pembayaran : </p>
                <table class="wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.75s">
                    <tr>
                        <td style="width:100px;">WA</td>
                        <td class="text-right"> : </td>
                        <td>Via CP</td>
                    </tr>
                    <tr>
                        <td style="width:100px;">Email</td>
                        <td class="text-right"> : </td>
                        <td>invofest@gmail.com</td>
                    </tr>
                </table>
                <br /><br />
                
                <h5 class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">Contact Person</h5>
                <table class="wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="1s">
                    <tr>
                        <td style="width:150px;">Zihan</td>
                        <td class="text-right"> : </td>
                        <td>0895 4228 09945</td>
                    </tr>
                </table>
            </div>
        </div>


@endsection