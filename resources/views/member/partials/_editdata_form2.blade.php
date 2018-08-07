<form method="POST" action="{{ route('member') }}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf

    <input type="hidden" class="form-control" id="jenis_lomba" name="jenis_lomba" value="{{ $user->jenis_lomba }}">

    <div class="form-group row">
        <label for="asal_sekolah" class="col-sm-2 col-form-label">Asal Sekolah / Perguruan Tinggi</label>
        <div class="col-sm-6">
            <input id="asal_sekolah" type="text" class="form-control{{ $errors->has('asal_sekolah') ? ' is-invalid' : '' }}" name="asal_sekolah" value="{{ $user->asal_sekolah }}" placeholder="Ketikan Asal Sekolah" required>

            @if ($errors->has('asal_sekolah'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('asal_sekolah') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="nama_ketua_tim" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-6">
            <input id="nama_ketua_tim" type="text" class="form-control{{ $errors->has('nama_ketua_tim') ? ' is-invalid' : '' }}" name="nama_ketua_tim" value="{{ $user->nama_ketua_tim }}" placeholder="Ketikan Nama Ketua Tim" required>

            @if ($errors->has('nama_ketua_tim'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nama_ketua_tim') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="no_ketua_tim" class="col-sm-2 col-form-label">No HP</label>
        <div class="col-sm-6">
            <input id="no_ketua_tim" type="number" class="form-control{{ $errors->has('no_ketua_tim') ? ' is-invalid' : '' }}" name="no_ketua_tim" value="{{ $user->no_ketua_tim }}" placeholder="Ketikan No HP Ketua Tim" required>

            @if ($errors->has('no_ketua_tim'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('no_ketua_tim') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="email_ketua_tim" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-6">
            <input id="email_ketua_tim" type="email" class="form-control{{ $errors->has('email_ketua_tim') ? ' is-invalid' : '' }}" value="{{ $user->email_ketua_tim }}" name="email_ketua_tim" placeholder="Ketikan Email Ketua Tim" required autocomplete="email">

            @if ($errors->has('email_ketua_tim'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email_ketua_tim') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="foto_ketua_tim" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-6">
            <img src="{{ asset('uploads/peserta/'.$user->foto_ketua_tim) }}" alt="Foto Ketua Tim" style="width: 100px;">
            <input id="foto_ketua_tim" type="file" class="form-control{{ $errors->has('foto_ketua_tim') ? ' is-invalid' : '' }}" value="{{ old('foto_ketua_tim') }}" name="foto_ketua_tim">
            <p><small>Ukuran foto maksimal 2MB berformat jpg / jpeg / png</small></p>

            @if ($errors->has('foto_ketua_tim'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('foto_ketua_tim') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <br />
    
    <div class="form-group row">
        <div class="col-sm-8 text-right">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>

{{-- kunci data --}}
<div class="form-group row">
    <label for="asal_sekolah" class="col-sm-2 col-form-label"><b>Kunci Data</b></label>
    <div class="col-sm-9">
        <hr>
    </div>
</div>
<p>Apakah sudah yakin semua data Anda benar? Silahkan cek kembali sebelum kunci data!</p>
<p>Data akan terkunci otomatis jika telah melewati batas pendaftaran kompetisi.</p>

<div id="kuncidata" class="form-group row">
    <div class="col-sm-8">
        <a href="javascript:void(0)" onclick="kuncidata()" class="btn btn-warning"><b><i class="fa fa-lock"></i> Kunci Data</b></a>
    </div>
</div>
