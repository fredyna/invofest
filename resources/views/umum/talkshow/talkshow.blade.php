@extends('template.member_depan.master')
@section('mycss')
    <style>
        #narasumber img {
            transition: transform .2s;
        }
        #narasumber img:hover {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }
    </style>
@endsection

@section('content')
    @include('member.partials._navbar')

    <div class="wrapper">

        <!-- section beranda -->
        <div id="beranda" class="page-header page-header-small">
            <div id="page-header-image" class="page-header-image" style="z-index:-1;background-image: url('{{ url('img/bg_sm2.jpg') }}');" data-parallax="true"></div>
            
            <div class="container">
                <div class="content-center">
                    <h2 class="title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s" >TALKSHOW <span style="font-weight: 100;">INTERAKTIF</span></h2>
                    <h5 class="wow shake" data-wow-duration="1s" data-wow-delay="0.5s" style="color: #BA853A;font-weight:600;margin-bottom:3%;">Tema : “Big Data Pada Software Engineering”</h5>
                    <div class="row justify-content-center">
                        <a href="{{ route('event.registrasi') }}" class="btn btn-primary" style="width: 200px;"><i class="fa fa-file-text"></i> Daftar</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end section beranda -->

        <!-- section deskripsi -->
        <div class="section section-deskripsi">
            <div class="container">
                <h4 class="section-title text-center wow bounceInDown" data-wow-duration="0.5s" data-wow-delay="0s">Deskripsi Talkshow</h4>

                <h5 class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">Penjelasan Umum</h5>
                <p class="text-justify wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.75s">
                    Talkshow adalah salah satu acara dari Invofest 2018 di mana peserta akan mendapatkan materi dengan tema "Big Data Pada Software Engineering". Peserta juga dapat bertanya langsung kepada pembicara talkshow. Acara talkshow akan dikemas dengan suasana santai.
                </p>
                <br/><br/>

                <h5 class="wow fadeInUp" data-wow-delay="0s" data-wow-duration="0.5s">Narasumber</h5>
                <div id="narasumber" class="row justify-content-center">
                    <div class="col-md-5 text-center wow zoomIn" data-wow-duration="0.5s" data-wow-delay="1s" style="margin:2%;">
                        <img src="{{ url('img/tokoh/peter.png') }}" alt="PETER JACK KAMBEY" width="200px" class="mx-auto d-block">
                        <br />
                        <h5>PETER JACK KAMBEY</h5>
                        <p>Head of Executive PHP Indonesia Community</p>
                    </div>

                    <div class="col-md-5 text-center wow zoomIn" data-wow-duration="0.5s" data-wow-delay="1s" style="margin:2%;">
                        <img src="{{ url('img/tokoh/alamsyah.png') }}" alt="ALAMSYAH HANZA" width="200px" class="mx-auto d-block">
                        <br />
                        <h5>ALAMSYAH HANZA</h5>
                        <p>Business Intelligence Analyst at GO-JEK</p>
                    </div>

                </div>
                <br /><br />

                <h5 class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">HTM &amp; Fasilitas</h5>
                <table class="wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.75s">
                    <tr>
                        <td style="width:100px;">Umum</td>
                        <td> : Rp 50.000,-</td>
                    </tr>
                    <tr>
                        <td style="width:100px;">Mahasiswa</td>
                        <td> : Rp 30.000,-</td>
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
                        <td>0896 3891 9393 (Fauziah Nur Rahmawati)</td>
                    </tr>
                    <tr>
                        <td style="width:100px;">Email</td>
                        <td class="text-right"> : </td>
                        <td>invofest@gmail.com</td>
                    </tr>
                </table>
                <br />
                <table class="wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.75s">
                    <tr>
                        <td style="width:100px;">Fasilitas</td>
                        <td> : Ilmu &amp; Snack</td>
                    </tr>
                </table>
                <br /><br />
                
                <h5 class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">Contact Person</h5>
                <table class="wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="1s">
                    <tr>
                        <td style="width:100px;">Putri Alvina</td>
                        <td class="text-right"> : </td>
                        <td>0898 6300 090</td>
                    </tr>
                    <tr>
                        <td style="width:100px;">Ibnu Subhan</td>
                        <td class="text-right"> : </td>
                        <td>0895 2652 5403</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection