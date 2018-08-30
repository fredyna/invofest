<!-- section media -->
<div id="section-sponsor" class="section section-sponsor">
    <div class="row judul-pemateri">
        <div class="col-sm-2">
            <h5 class="section-title text-center">Media Partners</h5>
        </div>
        <div id="garis" class="col-sm-10">
            <hr style="height: 3px;background-color: #BA853A;">
        </div>
    </div>
    <div class="container">
        <div class="row">
             @if(count($media) > 0)
                @foreach($media as $d)
                    <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                        <a href="{{ $d->link }}" target="_blank">
                            <img src="{{ url($d->logo) }}" alt="LOGO" class="mx-auto d-block">
                        </a>
                    </div>
                @endforeach
            @else 
                <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                    <img src="{{ url('img/media/media.png') }}" alt="LOGO" class="mx-auto d-block">
                </div>
                <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                    <img src="{{ url('img/media/media.png') }}" alt="LOGO" class="mx-auto d-block">
                </div>
                <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                    <img src="{{ url('img/media/media.png') }}" alt="LOGO" class="mx-auto d-block">
                </div>
                <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                    <img src="{{ url('img/media/media.png') }}" alt="LOGO" class="mx-auto d-block">
                </div>
                <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                    <img src="{{ url('img/media/media.png') }}" alt="LOGO" class="mx-auto d-block">
                </div>
                <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                    <img src="{{ url('img/media/media.png') }}" alt="LOGO" class="mx-auto d-block">
                </div>
             @endif 
            
        </div>
    </div>
</div>
<!-- end section media -->