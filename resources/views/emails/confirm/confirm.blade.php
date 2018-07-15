@component('mail::message')
# Konfirmasi Pendaftaran Kompetisi
<center><img src="{{ url('img/logo/invofest_logo.png') }}" alt="Logo Invofest" width="100px"></center><br />
Hai {{ $user->name }}, <br />
Terimakasih telah melakukan konfirmasi pendaftaran. {{ $kompetisi->jenis_lomba == 'dpc' ? '':'Tim' }} Anda telah dikonfirmasi mengikuti 
@if($kompetisi->jenis_lomba == 'adc')
    Application Development Competition.
@elseif($kompetisi->jenis_lomba == 'wdc')
    Web Design Competition.
@else
    Database Programming Competition.
@endif
Untuk tahap selanjutnya, silahkan mengikuti timeline sesuai informasi di rulebook berdasarkan kompetisi yang dipilih.<br /><br/>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
