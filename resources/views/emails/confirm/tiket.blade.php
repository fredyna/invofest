@component('mail::message')
# Informasi E-Ticket Invofest 2018

        @php
            $url = 'storage/qrcode/'.  $peserta->id_peserta  . '.png';
        @endphp

<center><img src="{{ url('img/logo/invofest_logo.png') }}" alt="Logo Invofest" width="100px"></center><br />
Hai {{ $peserta->nama }}, <br />
Terimakasih, Konfirmasi Pembayaran telah diterima. Selamat Bergabung di acara Invofest 2018. berikut adalah e-ticket anda , tunjukan barcode dibawah kepada panitia untuk dapat mengikuti acara<br>

<center><img src="{{ url($url) }}" alt="E-tiket" width="100px"></center><br />
<br>

<br /><br />
Thanks,<br />
{{ config('app.name') }}
@endcomponent
