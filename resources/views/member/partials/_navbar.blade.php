<!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="javascript:void(0)" rel="tooltip" title="Informatics Vocational Festival 2018 - Politeknik Harapan Bersama" data-placement="bottom">
                    <img src="{{ url('img/logo/invofest_logo_light.png') }}" alt="Logo Invofest 2018" style="width:40px;"> Invofest 2018
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="{{ url('img/blurred-image-1.jpg') }}">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('timeline') }}">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-outline-primary" rel="tooltip" onclick="location.href='{{ route('login') }}'" title="Silahkan masuk atau daftar" data-placement="bottom">
                            Masuk <i class="fa fa-sign-in"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    