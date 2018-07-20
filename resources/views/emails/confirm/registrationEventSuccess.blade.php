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
        <li>Workshop : Rp {{ $peserta->kategori == 'Mahasiswa' ? 'Rp 50.000,-':'Rp 75.000,-' }}</li>
        @php
            $total += $peserta->kategori == 'Mahasiswa' ? 50000:75000;
        @endphp
    @endif
    @if($peserta->seminar)
        <li>Seminar : Rp {{ $peserta->kategori == 'Mahasiswa' ? 'Rp 50.000,-':'Rp 75.000,-' }}</li>
        @php
            $total += $peserta->kategori == 'Mahasiswa' ? 50000:75000;
        @endphp
    @endif
    @if($peserta->talkshow)
        <li>Talkshow : Rp 30.000,-</li>
        @php
            $total += 30000;
        @endphp
    @endif
    <li>***********************************</li>
    <li>Total : Rp {{ number_format($total, 0, ',', '.').',-' }}</li>
</ul>
<br>
Tagihan tersebut dapat dibayarkan dengan transfer melalui rekening 0000 a/n NamaPemilikRekening atau dapat juga dibayarkan secara langsung melalui CP acara Invofest 2018.<br/><br/>
Jika Anda membayar tagihan melalui transfer, maka Anda dapat melakukan konfirmasi pembayaran ke email invofest@gmail.com dengan subject PembayaranBlabla atau dengan menghubungi CP acara Invofest 2018 dengan formatFormatan.

<br /><br />
Thanks,<br />
{{ config('app.name') }}
@endcomponent
