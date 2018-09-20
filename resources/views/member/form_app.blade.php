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
                    <h6>Halaman Member - Upload App dan Video</h6>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p>Upload file sesuai persyaratan pada kompetisi yang diikuti dalam bentuk zip / rar ke Google Drive, kemudian copy dan paste URL file tersebut ke dalam form. <br/> 
                    Ketentuan nama berkas app : App_ADC_namaTim_asalInstansi<br/>
                    Ketentuan nama berkas video : Video_ADC_namaTim_asalInstansi<br/>
                    </p>

                    <div class="alert alert-warning black">
                        Pastikan link berkas App &amp; Video telah dishare yang memungkinkan kami untuk mengunduh!
                    </div>

                    @if ($user->link_app != null && $user->link_video != null)
                        <div class="alert alert-info black">
                            Terima kasih telah mengirim link berkas App &amp; Video. Tunggu tahapan kompetisi selanjutnya!.
                        </div>
                    @else
                        <form action="{{ route('member.upload_app') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="link_app" class="col-sm-2 col-form-label">Link App</label>
                                <div class="col-sm-6">
                                    <input id="link_app" type="text" class="form-control{{ $errors->has('link_app') ? ' is-invalid' : '' }}" value="{{ old('link_app') }}" name="link_app" placeholder="Copy dan Pastekan Link App" required>
                        
                                    @if ($errors->has('link_app'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('link_app') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

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
