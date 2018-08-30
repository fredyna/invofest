@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="background-color: #0259b7; color: #FFF; box-shadow: 5px 5px 7px rgba(0, 0, 0, 0.2);">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 text-left">
                            <img src="{{ url('img/logo/invofest_logo_light.png') }}" alt="Logo Invofest 2018" style="width:40px;"> <span style="font-size:18px;">
                        </div>
                        <div class="col-6 text-right" style="padding-top:2%;">
                            <span class="pull-right">Halaman Registrasi Acara</span>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="background-color: #FFF; color:#000;">
                    <p class="alert alert-warning" style="color:#000;">Ketika klik daftar, pastikan muncul pemberitahuan sukses di halaman ini. Jika belum muncul, silahkan cek kembali data di form!</p>
                    <form method="POST" action="{{ route('event.registrasi') }}" aria-label="{{ __('Registrasi Event') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="kategori" class="col-md-4 col-form-label text-md-right">Kategori</label>

                            <div class="col-md-6" data-wow-duration="1s" data-wow-delay="2s">
                                <select name="kategori" id="kategori" class="form-control{{ $errors->has('kategori') ? ' is-invalid' : '' }}" required autofocus>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Umum" {{ old('kategori') == 'Umum' ? 'selected' : '' }}>Umum</option>
                                    <option value="Mahasiswa" {{ old('kategori') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa/Pelajar</option>
                                </select>

                                @if ($errors->has('kategori'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kategori') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="form-wrapper" style="display:none;">
                            <div class="form-group row">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
    
                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" placeholder="Ketikan Nama Lengkap" required  autocomplete="nama">
    
                                    @if ($errors->has('nama'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="asal_institusi" class="col-md-4 col-form-label text-md-right">Asal Institusi</label>
    
                                <div class="col-md-6">
                                    <input id="asal_institusi" type="text" class="form-control{{ $errors->has('asal_institusi') ? ' is-invalid' : '' }}" name="asal_institusi" value="{{ old('asal_institusi') }}" placeholder="Ketikan Asal Institusi" autocomplete="asal_institusi">
    
                                    @if ($errors->has('asal_institusi'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('asal_institusi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Ketikan Email" required autocomplete="email">
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="nomor_hp" class="col-md-4 col-form-label text-md-right">Nomor HP</label>
    
                                <div class="col-md-6">
                                    <input id="nomor_hp" type="number" class="form-control{{ $errors->has('nomor_hp') ? ' is-invalid' : '' }}" name="nomor_hp" value="{{ old('nomor_hp') }}" placeholder="Ketikan Nomor HP" required autofocus autocomplete="nomor_hp">
    
                                    @if ($errors->has('nomor_hp'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nomor_hp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">Jenis Kelamin</label>
                                <div class="col-md-6">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control{{ $errors->has('jenis_kelamin') ? ' is-invalid' : '' }}" required autofocus>
                                        <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
    
                                    @if ($errors->has('jenis_kelamin'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>
    
                                <div class="col-md-6">
                                    <textarea id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ old('alamat') }}" placeholder="Ketikan Alamat" required autofocus autocomplete="alamat">{{ old('alamat') }}</textarea>
    
                                    @if ($errors->has('alamat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('alamat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div id="div_ktm" class="form-group row">
                                <label for="ktm" class="col-md-4 col-form-label text-md-right">Foto KTM/Kartu OSIS</label>
    
                                <div class="col-md-6">
                                    <input type="file" id="ktm" name="ktm" class="form-control{{ $errors->has('ktm') ? ' is-invalid' : '' }}">
                                    <p><small>Ukuran foto maksimal 2MB</small></p>
                        
                                    @if ($errors->has('ktm'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ktm') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="pilih_acara" class="col-md-4 col-form-label text-md-right">Pilih Acara</label>
    
                                <div class="col-md-6">
                                    <input type="hidden" id="event" name="event" value="event">
                                    <input type="checkbox" id="talkshow" name="talkshow" value="Talkshow"> Talkshow<br>
                                    <input type="checkbox" id="workshop" name="workshop" value="Workshop" onclick="checkChecked()">  Workshop<br>
                                    <input type="checkbox" id="seminar" name="seminar" value="Seminar"> Seminar<br><br>
                        
                                    @if ($errors->has('pilih_acara'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pilih_acara') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div id="div_kategori_workshop" class="form-group row" style="display:none;">
                                <label for="kategori_workshop" class="col-md-4 col-form-label text-md-right">Kategori Workshop</label>
                                <div class="col-md-6">
                                    <select name="kategori_workshop" id="kategori_workshop" class="form-control{{ $errors->has('kategori_workshop') ? ' is-invalid' : '' }}" required autofocus>
                                        <option value="UI/UX Design" {{ old('kategori_workshop') == 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design</option>
                                        <option value="Web Services" {{ old('kategori_workshop') == 'Web Services' ? 'selected' : '' }}>Web Services</option>
                                        <option value="Cyber Security" {{ old('kategori_workshop') == 'Cyber Security' ? 'selected' : '' }}>Cyber Security</option>
                                        <option value="Data Science" {{ old('kategori_workshop') == 'Data Science' ? 'selected' : '' }}>Data Science</option>
                                    </select>
    
                                    @if ($errors->has('kategori_workshop'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kategori_workshop') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Daftar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('potongan_script')
    $(document).ready(function(){
        if($("#kategori").val() != ''){
            $("#kategori").change();
        }
        $("#kategori").change();
        $("#kategori").click(function(){
            $("#kategori").change();
        });
        $("#kategori").change(function(){
            if($("#kategori").val() != ""){
                $("#form-wrapper").show();
            } else{
                $("#form-wrapper").hide();
            }

            if($("#kategori").val() == "Umum"){
                $("#div_ktm").hide();
            }
            if($("#kategori").val() == "Mahasiswa"){
                $("#div_ktm").show();
            }
        });
    });

    function checkChecked(){
        if($("#workshop").prop("checked")){
            $("#div_kategori_workshop").show();
        } else {
            $("#div_kategori_workshop").hide();
        }
    }
@endsection
