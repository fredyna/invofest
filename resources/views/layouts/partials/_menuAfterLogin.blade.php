<li class="nav-item">
        <a class="nav-link" href="{{ route('member.konfirmasi') }}" style="color: #FFF;">Konfirmasi Pendaftaran</a>
</li>
@if($user->id != null && $user->jenis_lomba != 'dpc')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('member.upload_berkas') }}" style="color: #FFF;">Upload Berkas</a>
    </li>
@endif
&nbsp;&nbsp;&nbsp;
