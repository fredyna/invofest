@extends('layouts.app')

@section('mycss')
    <style>
        .black{
            color: #000;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6>Halaman Member - Isi Data</h6>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (isset($user) && $user->id != null)
                        @if ($user->lock)
                            <div class="alert alert-warning" style="color: #000;">
                               <i class="fa fa-lock"></i> Data telah terkunci! Apakah sudah melakukan konfirmasi pendaftaran? jika belum, lakukan konfirmasi pendaftaran di menu <a href="{{ url('member/konfirmasi') }}" target="_self" class="black" style="color:blue;text-decoration:underline;">Konfirmasi Pendaftaran.</a>
                            </div>
                            <p><b>Data Anda :</b></p>
                            <br />

                            @include('member.partials._fixdata_form2')
                        @else
                            <div class="alert alert-warning" style="color: #000;">
                                Pastikan telah mengisi data dengan benar sebelum melakukan kunci data, karena setelah Anda mengunci data maka data Anda tidak dapat diubah kembali.
                            </div> 
                            <p><b>Data Anda :</b></p>
                            <br />

                            @include('member.partials._editdata_form2')
                        @endif

                    @else
                        <div class="alert alert-warning" style="color: #000;">
                            Pastikan telah mengisi data dengan benar sebelum melakukan kunci data, karena setelah Anda mengunci data maka data Anda tidak dapat diubah kembali.
                        </div> 
                        <p><b>Silahkan isi data Anda :</b></p>
                        <br />
                        
                        @include('member.partials._isidata_form2')
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('potongan_script')
    function kuncidata(){
        var y = confirm("Apakah sudah yakin data Anda akan dikunci?");
        if(y == true){
            var BASE_URL = "{{ route('member.kuncidata') }}";
            location.href = BASE_URL;
        }
    }
@endsection