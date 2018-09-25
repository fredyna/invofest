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
                    <h6>Halaman Member - Konfirmasi Pendaftaran</h6>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="alert alert-warning black">
                        Ketentuan berkas yang harus diupload untuk konfirmasi pendaftaran : <br />
                        @if ($user->jenis_lomba == 'dpc')
                            1. File hasil scan Kartu Tanda Mahasiswa (KTM) (1 lembar). <br />
                        @elseif ($user->jenis_lomba == 'adc')
                            1. File hasil scan Surat Keterangan Mahasiswa Aktif (1 lembar). <br />
                        @else
                            1. File hasil scan Surat Keterangan Siswa Aktif (1 lembar). <br />
                        @endif
                        2. Bukti bayar / transfer biaya registrasi. <br />
                        Dua file di atas dijadikan satu dalam file zip. <br/><br/>
                        Ketentuan nama berkas : konfirINV18_jenisLomba_namaTim_asalInstansi<br/>
                        Jenis Lomba :<br />
                        1. ADC (Application Development Competition)<br/>
                        2. WDC (Web Design Competition)<br/>
                        3. DPC (Database Programming Competition)<br/>
                    </div>

                    @if ($user->berkas_konfirmasi != null)
                        <div class="alert alert-info black">
                            Anda telah mengunggah berkas konfirmasi pendaftaran. Jika belum mendapat konfirmasi dari panitia, segera hubungi contact person masing-masing kompetisi atau hubungi via email!.
                        </div>
                    @else
                        <form action="{{ route('member.konfirmasi') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="berkas_konfirmasi" class="col-sm-2 col-form-label">Berkas Konfirmasi</label>
                                <div class="col-sm-6">
                                    <input id="berkas_konfirmasi" type="file" class="form-control{{ $errors->has('berkas_konfirmasi') ? ' is-invalid' : '' }}" value="{{ old('berkas_konfirmasi') }}" name="berkas_konfirmasi">
                                    <p><small>Ukuran file maksimal 2MB berformat zip / rar</small></p>
                        
                                    @if ($errors->has('berkas_konfirmasi'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('berkas_konfirmasi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-8 text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
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
