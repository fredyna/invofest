@extends('template.member_depan.master')
@section('content')
    @include('member.partials._navbar')

    <div class="wrapper">

        <!-- section beranda -->
        <div id="beranda" class="page-header page-header-small">
            <div id="page-header-image" class="page-header-image" style="z-index:-1;background-image: url('{{ url('img/header/header.jpg') }}');" data-parallax="true"></div>
            
            <div class="container">
                <div class="content-center">
                    <h1 class="title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s" >BERITA INVOFEST</h1>
                    <h5 class="wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.5s">KUMPULAN INFORMASI ACARA, INFORMASI KEGIATAN, PUBLIKASI PEMENANG</h5>
                </div>
            </div>
        </div>
        <!-- end section beranda -->

        <!-- section informasi -->
        <div id="section-info" class="section section-info" style="background-image: url('{{ url('img/background.jpg') }}'); background-size:cover;">
            <h4 class="section-title text-center">Informasi</h4>
            <div class="container">

                @if(count($post) > 0)
                    <div class="row">
                        @foreach($post as $d)
                            <div class="col-lg-4">
                                <div class="card">
                                    <img class="card-img-top" src="{{ url($d->gambar) }}" alt="Card image cap">
                                    <div class="card-body">
                                    <h5 class="card-title">{{ $d->judul }}</h5>
                                    @php
                                        $desc = str_limit($d->deskripsi, 120);
                                    @endphp
                                    <p class="card-text">{!!html_entity_decode($desc)!!}</p>
                                    
                                    <a href="javascript:void(0)" onclick="gotoNews({{ $d->id }})">Baca Selengkapnya <i class="fa fa-arrow-right"></i></a>
                                    <form id="{{ 'formnews'.$d->id }}" method="get" action="{{ url('news/detail') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $d->id }}">
                                    </form>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center lihat-lainnya">
                        @if($offset > 0)
                            @php
                                $back_offset = $offset - 1;
                            @endphp
                            <a href="{{ url('news/'.$back_offset) }}" class="btn btn-outline-light wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s"><i class="fa fa-arrow-left fa-2x"></i></a>
                        @else
                            <a style="cursor:not-allowed; pointer-events: none; color:#808080; border-color:#808080;" href="javascript:void(0)" class="btn btn-outline-light wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s"><i class="fa fa-arrow-left fa-2x"></i></a>
                        @endif
                        
                        &nbsp;&nbsp;

                        @if($offset < $max_offset)
                            @php
                                $next_offset = $offset + 1;
                            @endphp
                            <a href="{{ url('news/'.$next_offset) }}" class="btn btn-outline-light wow fadeInRight" data-wow-duration="1s" data-wow-delay="0s"><i class="fa fa-arrow-right fa-2x"></i></a>
                        @else
                            <a style="cursor:not-allowed; pointer-events: none; color:#808080; border-color:#808080;" href="javascript:void(0)" class="btn btn-outline-light wow fadeInRight" data-wow-duration="1s" data-wow-delay="0s"><i class="fa fa-arrow-right fa-2x"></i></a>
                        @endif
                    </div>
                @else
                    <div class="text-center col-12">
                        <p class="text-white"><i>Belum ada informasi</i></p>
                        <br /><br/>
                    </div>
                @endif

            </div>
        </div>
        <!-- end section informasi -->

        @include('member.partials._sponsor')
    </div>
@endsection

@section('myscript')
    <script>
        function gotoNews(id){
            $("#formnews"+id).submit();
        }
    </script>
@endsection