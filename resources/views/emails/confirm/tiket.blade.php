@component('mail::message')

<style>
        table {
            border-collapse: collapse;
            width: 100%;
            
        }
        
        th, td {
            text-align: left;
            /* padding: 1px; */
            margin: 2px;
            
        }
        
        /* tr:nth-child(even) {background-color: #f2f2f2;} */
        </style>

# Informasi E-Ticket Invofest 2018

        @php
            $url = 'uploads/qrcode/'.  $peserta->id_peserta  . '.png';
        @endphp

<br />
Hai {{ $peserta->nama }}, <br />
Terimakasih, Konfirmasi Pembayaran telah diterima. Selamat Bergabung di acara Invofest 2018. berikut adalah e-ticket anda , tunjukan barcode dibawah kepada panitia untuk dapat mengikuti acara<br>
<center><img src="{{ url('img/logo/invofest_logo.png') }}" alt="Logo Invofest" width="100px"></center>
<br>

<center>
    <h2>E-Ticket : </h2>
    <table style="border: 1px solid black;">
        <tr>
            <td colspan="3">
                 <center> 
                       <img src="{{ url('img/logo/vertical.png') }}" alt="Logo Invofest Vertical" height="35px">
                 </center>
                </td>
        </tr>
        <tr style="border: 1px solid black;">
        <td style="border: 1px solid black; transform: rotate(270deg); line-height:0; margin : 0px; padding : 0px;" rowspan="5"><p style="padding : 1px; font-size : 11px;"><b> {{$peserta->id_peserta}}</b></p></td>
                <td>Nama : {{$peserta->nama}}</td>
        <td style="border: 1px solid black;" rowspan="5"><center><img src="{{ url($url) }}" alt="E-tiket" width="150px"></center><br /></td>
              </tr>
              <tr style="border: 1px solid black;">
                <td>kategori : {{$peserta->kategori}}</td>
              </tr >
              <tr style="border: 1px solid black;">
                <td>Jenis Pembayaran : {{$peserta->jenis_pembayaran}}</td>
              </tr>
              <tr style="border: 1px solid black;">
                <td>event : <br>

                    @php
                        if ($peserta->talkshow == 1){
                         echo '<input type="checkbox" checked disabled>
                            Talkshow <br/>';                             
                        }else {
                            echo '<input type="checkbox" disabled>
                           Talkshow <br/>';
                        }

                        if ($peserta->workshop == 1){
                         echo '<input type="checkbox" checked disabled>
                            Workshop <br/>';                             
                        }else {
                            echo '<input type="checkbox" disabled>
                           Workshop <br/>';
                        }

                        if ($peserta->seminar == 1){
                         echo '<input type="checkbox" checked disabled>
                            Seminar <br/>';                             
                        }else {
                            echo '<input type="checkbox" disabled>
                           Seminar <br/>';
                        }

                    @endphp
                    



                </td>
              </tr>
            <tr style="border: 1px solid black;">
                <td>
                    @php 
                        if ($peserta->workshop == 1){
                         echo 'Kategori Workshop :'. $peserta->kategori_workshop .' <br/>';                             
                        }else {
                            echo 'Kategori Workshop : -';
                        }
                    @endphp
                     
                </td>
            </tr>
            
              <tr>
                    <td colspan="3" style="text-align : center; ">
                            Lokasi : Kampus 1 Politeknik Harapan Bersama , Jalan Mataram No.9 Pesurungan Lor , Kota Tegal
                    </td>  
                </tr>
    </table>
</center>

<br /><br />
Thanks,<br />
{{ config('app.name') }}
@endcomponent
