<!-- section sponsor -->
<div id="section-sponsor" class="section section-sponsor">
    <div class="container">
        <h4 class="section-title text-center">Sponsor By</h4>
        <div class="row">
            @if(count($sponsor) > 0)
                @foreach($sponsor as $d)
                    <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                        <a href="{{ $d->link }}" target="_blank">
                            <img src="{{ url($d->logo) }}" alt="LOGO" class="mx-auto d-block">
                        </a>
                    </div>
                @endforeach
            @else
                <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                    <img src="{{ url('img/sponsor/sponsor.png') }}" alt="LOGO" class="mx-auto d-block">
                </div>
                <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                    <img src="{{ url('img/sponsor/sponsor.png') }}" alt="LOGO" class="mx-auto d-block">
                </div>
                <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                    <img src="{{ url('img/sponsor/sponsor.png') }}" alt="LOGO" class="mx-auto d-block">
                </div>
                <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                    <img src="{{ url('img/sponsor/sponsor.png') }}" alt="LOGO" class="mx-auto d-block">
                </div>
                <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                    <img src="{{ url('img/sponsor/sponsor.png') }}" alt="LOGO" class="mx-auto d-block">
                </div>
                <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                    <img src="{{ url('img/sponsor/sponsor.png') }}" alt="LOGO" class="mx-auto d-block">
                </div>
            @endif
            
        </div>
    </div>
</div>
<!-- end section sponsor -->