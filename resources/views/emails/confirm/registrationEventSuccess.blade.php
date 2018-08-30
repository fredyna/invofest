@component('mail::message')
# Informasi Registrasi Acara Invofest 2018 Berhasil
<center><img src="{{ url('img/logo/invofest_logo.png') }}" alt="Logo Invofest" width="100px"></center><br />
Hai {{ $peserta->nama }}, <br />
Terimakasih telah registrasi di acara Invofest 2018. Untuk melanjutkan pendaftaran pada acara yang telah dipilih, Anda dikenakan tagihan sebesar :<br>
<ul>
    <li>***********************************</li>
    @php
        $total = 0;
    @endphp
    @if($peserta->workshop)
        <li>Workshop : Rp {{ $peserta->kategori == 'Mahasiswa' ? 'Rp 75.000,-':'Rp 100.000,-' }}</li>
        @php
            $total += $peserta->kategori == 'Mahasiswa' ? 75000:100000;
        @endphp
    @endif
    @if($peserta->seminar)
        <li>Seminar : Rp {{ $peserta->kategori == 'Mahasiswa' ? 'Rp 75.000,-':'Rp 100.000,-' }}</li>
        @php
            $total += $peserta->kategori == 'Mahasiswa' ? 75000:100000;
        @endphp
    @endif
    @if($peserta->talkshow)
        <li>Talkshow : Rp {{ $peserta->kategori == 'Mahasiswa' ? 'Rp 30.000,-':'Rp 50.000,-' }}</li>
        @php
            $total += $peserta->kategori == 'Mahasiswa' ? 30000:50000;
        @endphp
    @endif
    <li>***********************************</li>
    <li>Total : Rp {{ number_format($total, 0, ',', '.').',-' }}</li>
</ul>
<br>
Tagihan tersebut dapat dibayarkan dengan transfer melalui rekening 6072-01-015533-53-2 (BRI) a/n Fauziah Nur Rahmawati atau dapat juga dibayarkan secara langsung melalui salah satu panitia Invofest 2018 a/n Fauziah Nur Rahmawati 0896 3891 9393 (WA).<br/><br/>
Jika Anda membayar tagihan melalui transfer, maka Anda dapat melakukan konfirmasi pembayaran ke email invofest@gmail.com atau konfirmasi via WA a/n Fauziah Nur Rahmawati 0896 3891 9393 dengan subject BuktiBayar_Invofest2018_NamaAnda dan dilampirkan foto/hasil scan bukti transfer.

<br /><br />
Thanks,<br />
{{ config('app.name') }}
@endcomponent
