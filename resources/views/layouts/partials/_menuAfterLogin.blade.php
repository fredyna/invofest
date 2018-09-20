<li class="nav-item">
        <a class="nav-link" href="{{ route('member.konfirmasi') }}" style="color: #FFF;">Konfirmasi Pendaftaran</a>
</li>
@if($user->id != null && $user->jenis_lomba != 'dpc')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('member.upload_berkas') }}" style="color: #FFF;">Upload Berkas</a>
    </li>
    @if($user->jenis_lomba == 'adc')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('member.upload_app') }}" style="color: #FFF;">Upload App &amp; Video</a>
        </li>
    @endif
@endif
&nbsp;&nbsp;&nbsp;
