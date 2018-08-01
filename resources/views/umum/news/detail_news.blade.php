@extends('template.member_depan.master')
@section('mycss')
   
@endsection

@section('content')
    @include('member.partials._navbar')

    <div class="wrapper">

        <!-- section beranda -->
        <div id="beranda" class="page-header page-header-small">
            <div id="page-header-image" class="page-header-image" style="z-index:-1;background-image: url('{{ url('img/bg_sm2.jpg') }}');" data-parallax="true"></div>
            
            <div class="container">
                <div class="content-center">
                    <h2 class="title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s" >BERITA INVOFEST</h2>
                </div>
            </div>
        </div>
        <!-- end section beranda -->

        <!-- section deskripsi -->
        <div class="section section-deskripsi">
            <div class="container">
                <h4 class="section-title text-center wow bounceInDown" data-wow-duration="0.5s" data-wow-delay="0s">
                    {{ $post->judul }}<br/>
                    <small class="text-black">{{ date('l, d M Y H:i:s', strtotime($post->updated_at)) }}</small>
                </h4>
                
                <div class="row justify-content-md-center">
                    <div class="col-md-10">
                        <img class="mx-auto d-block" src="{{ url($post->gambar) }}" alt="Gambar Berita">
                    </div>
                    <br/><br/>
                    <div class="col-md-10 text-justify wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.75s">
                        <br/><br/>
                        {!!html_entity_decode($post->deskripsi)!!}
                    </div>
                </div>
                <br/><br/>

            </div>
        </div>


@endsection