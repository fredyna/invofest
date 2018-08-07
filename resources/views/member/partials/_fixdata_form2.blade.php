
<div class="form-group row">
    <label for="jenis_lomba" class="col-sm-2 col-form-label">Jenis Lomba</label>
    <div class="col-sm-6">
        <input id="jenis_lomba" type="text" class="form-control{{ $errors->has('jenis_lomba') ? ' is-invalid' : '' }}" name="jenis_lomba" value="{{ $user->jenis_lomba == 'dpc' ? 'DATABASE PROGRAMMING COMPETITION' : '' }}" required readonly>
    </div>
</div>
<br />

<div class="form-group row">
    <label for="asal_sekolah" class="col-sm-2 col-form-label">Asal Sekolah / Perguruan Tinggi</label>
    <div class="col-sm-6">
        <input id="asal_sekolah" type="text" class="form-control{{ $errors->has('asal_sekolah') ? ' is-invalid' : '' }}" name="asal_sekolah" value="{{ $user->asal_sekolah }}" placeholder="Ketikan Asal Sekolah" required readonly>
    </div>
</div>
<br />

<div class="form-group row">
    <label for="nama_ketua_tim" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-6">
        <input id="nama_ketua_tim" type="text" class="form-control{{ $errors->has('nama_ketua_tim') ? ' is-invalid' : '' }}" name="nama_ketua_tim" value="{{ $user->nama_ketua_tim }}" placeholder="Ketikan Nama Ketua Tim" required readonly>
    </div>
</div>

<div class="form-group row">
    <label for="no_ketua_tim" class="col-sm-2 col-form-label">No HP</label>
    <div class="col-sm-6">
        <input id="no_ketua_tim" type="number" class="form-control{{ $errors->has('no_ketua_tim') ? ' is-invalid' : '' }}" name="no_ketua_tim" value="{{ $user->no_ketua_tim }}" placeholder="Ketikan No HP Ketua Tim" required readonly>
    </div>
</div>
<div class="form-group row">
    <label for="email_ketua_tim" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-6">
        <input id="email_ketua_tim" type="email" class="form-control{{ $errors->has('email_ketua_tim') ? ' is-invalid' : '' }}" value="{{ $user->email_ketua_tim }}" name="email_ketua_tim" placeholder="Ketikan Email Ketua Tim" required autocomplete="email" readonly>
    </div>
</div>
<div class="form-group row">
    <label for="foto_ketua_tim" class="col-sm-2 col-form-label">Foto</label>
    <div class="col-sm-6">
        <img src="{{ asset('uploads/peserta/'.$user->foto_ketua_tim) }}" alt="Foto Ketua Tim" style="width: 100px;">
    </div>
</div>