@php
    $d = date('d', strtotime($post->updated_at)); 
    $m = date('m', strtotime($post->updated_at)); 
    $y = date('Y', strtotime($post->updated_at)); 
    $jam = date('H:i:s', strtotime($post->updated_at)); 
    $bulan = ['Januari','Februari','Maret','April','Mei','Juni',
            'Juli','Agustus','September','Oktober','November','Desember'];
@endphp