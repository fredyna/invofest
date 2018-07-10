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
                    <h6>Halaman Member - Upload Berkas</h6>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p>Upload file sesuai persyaratan pada kompetisi yang diikuti dalam bentuk zip / rar ke Google Drive, kemudian copy dan paste URL file tersebut ke dalam form. <br/> 
                    Ketentuan nama berkas : berkasINV18_jenisLomba_namaTim_asalInstansi<br/>
                    Jenis Lomba :<br />
                    1. ADC (Application Development Competition)<br/>
                    2. WDC (Web Design Competition)<br/>
                    3. DPC (Database Programming Competition)<br/>
                    </p>

                    <div class="alert alert-warning black">
                        Pastikan link berkas telah dishare yang memungkinkan kami untuk mengunduh!
                    </div>

                    @if ($user->link_berkas != null)
                        <div class="alert alert-info black">
                            Terima kasih telah mengirim link berkas. Tunggu tahapan kompetisi selanjutnya!.
                        </div>
                    @else
                        <form action="{{ route('member.upload_berkas') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="link_berkas" class="col-sm-2 col-form-label">Link Berkas</label>
                                <div class="col-sm-6">
                                    <input id="link_berkas" type="text" class="form-control{{ $errors->has('link_berkas') ? ' is-invalid' : '' }}" value="{{ old('link_berkas') }}" name="link_berkas" placeholder="Copy dan Pastekan Link Berkas" required>
                        
                                    @if ($errors->has('link_berkas'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('link_berkas') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            @if ($user->jenis_lomba == 'adc')
                                <div class="form-group row">
                                    <label for="link_video" class="col-sm-2 col-form-label">Link Video</label>
                                    <div class="col-sm-6">
                                        <input id="link_video" type="text" class="form-control{{ $errors->has('link_video') ? ' is-invalid' : '' }}" value="{{ old('link_video') }}" name="link_video" placeholder="Copy dan Pastekan Link Video" required>
                            
                                        @if ($errors->has('link_video'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('link_video') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endif

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
