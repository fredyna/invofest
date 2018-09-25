<div class="modal fade in" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
                <div class="modal-body">
                    

                    <div class="form-group row">
                        <label for="jenis_lomba" class="col-sm-4 col-form-label">Jenis Lomba</label>
                        <div class="col-sm-8">
                            <input id="jenis_lomba" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <br />

                    <div class="form-group row">
                        <label for="nama_tim" class="col-sm-4 col-form-label">Nama TIM</label>
                        <div class="col-sm-8">
                            <input id="nama_tim" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <br />
                    
                    <div class="form-group row">
                        <label for="asal_sekolah" class="col-sm-4 col-form-label">Asal Sekolah / Perguruan Tinggi</label>
                        <div class="col-sm-8">
                            <input id="asal_sekolah" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <br />
                    
                    {{-- Data ketua tim --}}
                    <div class="form-group row">
                        <label for="data_ketua_tim" class="col-sm-4 col-form-label"><b>Data Ketua Tim</b></label>
                        <div class="col-sm-8">
                            <hr>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_ketua_tim" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input id="nama_ketua_tim" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="no_ketua_tim" class="col-sm-4 col-form-label">No HP</label>
                        <div class="col-sm-8">
                            <input id="no_ketua_tim" type="number" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email_ketua_tim" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input id="email_ketua_tim" type="email" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto_ketua_tim" class="col-sm-4 col-form-label">Foto</label>
                        <div class="col-sm-8">
                            <img id="foto_ketua_tim" alt="Foto Ketua Tim" style="width: 100px;">
                        </div>
                    </div>
                    <br /><br />
                    
                    <div id="data-anggota-1" style="display:none;">
                        {{-- Data Anggota 1 --}}
                        <div class="form-group row">
                            <label for="data_anggota_1" class="col-sm-4 col-form-label"><b>Data Anggota 1</b></label>
                            <div class="col-sm-8">
                                <hr>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_anggota_1" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_anggota_1" name="nama_anggota_1" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_anggota_1" class="col-sm-4 col-form-label">No HP</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="no_anggota_1" name="no_anggota_1" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email_anggota_1" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email_anggota_1" name="email_anggota_1" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_anggota_1" class="col-sm-4 col-form-label">Foto</label>
                            <div class="col-sm-8">
                                <img id="foto_anggota_1" alt="Foto Anggota 1" style="width: 100px;">
                            </div>
                        </div>
                        <br /><br />
                    </div>

                    <div id="data-anggota-2" style="display:none">
                        {{-- Data Anggota 2 --}}
                        <div class="form-group row">
                            <label for="asal_sekolah" class="col-sm-4 col-form-label"><b>Data Anggota 2</b></label>
                            <div class="col-sm-8">
                                <hr>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_anggota_2" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_anggota_2" name="nama_anggota_2" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_anggota_2" class="col-sm-4 col-form-label">No HP</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="no_anggota_2" name="no_anggota_2" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email_anggota_2" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email_anggota_2" name="email_anggota_2" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_anggota_2" class="col-sm-4 col-form-label">Foto</label>
                            <div class="col-sm-8">
                                <img id="foto_anggota_2" alt="Foto Anggota 2" style="width: 100px;">
                            </div>
                        </div>
                        <br /><br />
                    </div>

                    <div class="form-group row">
                        <label for="berkas_konfirmasi" class="col-sm-4 col-form-label"><b>Berkas Konfirmasi</b></label>
                        <div class="col-sm-8">
                            <a id="berkas_konfirmasi" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Download</a>
                        </div>
                    </div>
                    
                    <div id="div_link_berkas" class="form-group row">
                        <label for="link_berkas" class="col-sm-4 col-form-label"><b>Link Berkas</b></label>
                        <div class="col-sm-8">
                            <a id="link_berkas" class="btn btn-success btn-sm" style="display:none;">Visit <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <div id="div_link_app" class="form-group row">
                        <label for="link_app" class="col-sm-4 col-form-label"><b>Link App</b></label>
                        <div class="col-sm-8">
                            <a id="link_app" class="btn btn-success btn-sm" style="display:none;">Visit <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <div id="div_link_video" class="form-group row">
                        <label for="link_video" class="col-sm-4 col-form-label"><b>Link Video</b></label>
                        <div class="col-sm-8">
                            <a id="link_video" class="btn btn-success btn-sm" style="display:none;">Visit <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <form id="form_konfirmasi" method="POST" action="{{ route('api.kompetisi.konfirmasi') }}">
                        @csrf
                        <input id="id" type="hidden" name="id">
                    </form>
                    <button id="konfirmasi" type="button" class="btn btn-primary">Konfirmasi</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            
        </div>
    </div>
</div>