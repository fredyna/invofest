<!-- section informasi -->
    <div id="section-info" class="section section-info" style="background-image: url('{{ url('img/background.jpg') }}');">
        <h4 class="section-title text-center">Informasi</h4>
        <div class="container">

            @if(count($post) > 0)
                <div class="row">
                    @php
                        $count_data = 1;
                    @endphp
                        @foreach($post as $d)
                            @if($count_data <= 3)
                                <div class="col-lg-4 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0s">
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
                            @endif
                            @php $count_data++; @endphp
                        @endforeach
                </div>

                @if(count($post) > 3)
                    <div class="text-center lihat-lainnya">
                        <a href="{{ route('news') }}" class="btn btn-outline-light" >LIHAT LAINNYA</a>
                    </div>
                @endif
            @else
                <div class="text-center col-12">
                    <p class="text-white"><i>Belum ada informasi</i></p>
                    <br /><br/>
                </div>
            @endif

        </div>
    </div>
    <!-- end section informasi -->