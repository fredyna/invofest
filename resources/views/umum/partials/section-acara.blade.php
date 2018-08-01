<!-- section acara -->
    <div id="section-acara" class="section section-acara" style="background-image: url('{{ url('img/background.jpg') }}');">
        <div class="container-fluid">
            <h4 class="section-title text-center">Rangkaian Acara Invofest</h4>
            <div class="row">
                <div class="col-md-6 col-lg-3 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <div class="kotak-acara">
                        <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/microphone.png') }}" alt="TALKSHOW">
                        <h5 class="text-center">TALKSHOW</h5>
                        <p class="ket-acara text-center">Talkshow interaktif dengan tema Big Data Pada Software Engineering</p>
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
                        <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/trophy.png') }}" alt="COMPETITION">
                        <h5 class="text-center">IT COMPETITION</h5>
                        <p class="ket-acara text-center">Kompetisi IT : Application Development, Web Design, dan Database Programming untuk pelajar dan mahasiswa tingkat nasional</p>
                        <a href="{{ url('/itcompetition') }}" class="btn btn-outline-primary">Info Lengkap</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <div class="kotak-acara">
                        <img class="icons-acara mx-auto d-block" src="{{ url('img/icons/presentation.png') }}" alt="SEMINAR">
                        <h5 class="text-center">SEMINAR NASIONAL</h5>
                        <p class="ket-acara text-center">Seminar nasional dengan tema Artificial Intelegence dalam Transformasi Teknologi Industri Masa Depan</p>
                        <a href="{{ route('seminar') }}" class="btn btn-outline-primary">Info Lengkap</a>
                    </div>
                </div>
            </div>

            @include('umum.partials.pemateri')
            
        </div>
    </div>
    <!-- end section acara -->