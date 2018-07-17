<li class="nav-item">
    <a class="nav-link" href="{{ route('member') }}" style="color: #FFF;"><i class="fa fa-home"></i> </a>
</li>
<li class="nav-item">
        <a class="nav-link" href="{{ route('member.konfirmasi') }}" style="color: #FFF;">Konfirmasi Pendaftaran</a>
</li>
@if($user->id != null && $user->jenis_lomba != 'dpc')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('member.upload_berkas') }}" style="color: #FFF;">Upload Berkas</a>
    </li>
@endif
&nbsp;&nbsp;&nbsp;
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #FFF;">
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background-color: #022851;">
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="color:#FFF;">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>