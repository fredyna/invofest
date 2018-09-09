<div class="modal fade in" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" class="form-horizontal" >
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    
                    <div class="form-group">
                        <label for="tanggal" class="col-md-3 control-label">Tanggal</label>
                        <div class="col-md-6">
                            <input type="text" id="tanggal" name="tanggal" class="form-control">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="nama" class="col-md-3 control-label">Nama Peserta</label>
                        <div class="col-md-6">
                            <input type="text" id="nama" name="nama" class="form-control">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>


                    <div class="form-group">
                      <label for="asal_institusi" class="col-md-3 control-label">Asal Institusi</label>
                      <div class="col-md-6">
                          <input type="text" id="asal_institusi" name="asal_institusi" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="kategori" class="col-md-3 control-label">Kategori</label>
                        <div class="col-md-6">
                            <input type="text" id="kategori" name="kategori" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                      </div>

                      <div class="form-group" id="ktm">
                        <label for="foto_ktm" class="col-md-3 control-label">Foto KTM</label>
                        <div class="col-md-6">
                        <a id="link_foto_ktm" href="javascript:void(0)" target="_blank">
                            <img id="foto_ktm" src="{{asset('img/foto_ktm/1.jpg')}}" style="width:50px;">
                        </a>
                            <span class="help-block with-errors"></span>
                        </div>
                      </div>

                    <div class="form-group">
                      <label for="nomor_hp" class="col-md-3 control-label">Nomor HP.</label>
                      <div class="col-md-6">
                          <input type="text" id="nomor_hp" name="nomor_hp" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email.</label>
                        <div class="col-md-6">
                            <input type="text" id="email" name="email" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                      </div>

                    <div class="form-group">
                      <label for="event" class="col-md-3 control-label">Event</label>
                      <div class="col-md-6">
                          {{-- <input type="checkbox" id="workshop" name="workshop" class="form-control" required> --}}
                          <label>
                            <input type="checkbox" name="talkshow" class="pull-left" id="talkshow" value="1">
                           Talkshow
                        </label>
                        <br/>  

                          <label>
                          <input type="checkbox" name="seminar" class="pull-left" id="seminar" value="1">
                           Seminar
                        </label>
                        <br/>

                        <label>
                          <input type="checkbox" name="workshop" class="pull-left" id="workshop" value="1">
                           Workshop
                        </label>

                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="kategori_workshop" class="col-md-3 control-label">Kategori Workshop</label>
                      <div class="col-md-6">
                          <select id="kategori_workshop" name="kategori_workshop" class="form-control" required>
                            <option readonly>-- Pilih Kategori --</option>
                            <option>UI/UX Design</option>
                            <option>Web Services</option>
                            <option>Cyber Security</option>
                            <option>Data Science</option>
                          </select>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="jenis_pembayaran" class="col-md-3 control-label">Jenis Pembayaran</label>
                        <div class="col-md-6">
                            <select id="jenis_pembayaran" name="jenis_pembayaran" class="form-control" required>
                              <option readonly>-- Pilih Kategori --</option>
                              <option>Langsung</option>
                              <option>Transfer</option>
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label id="bayar" name="bayar" class="col-md-8 control-label" ></label>
                      </div>
                     

                <div class="modal-footer">
                    <button id="tombolsubmit" type="submit" class="btn btn-primary btn-flat" style="display:none;">Submit</button>
                    <button id="tomboledit" type="button" onclick="editForm()" class="btn btn-warning btn-flat">Edit</button>
                    <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Cancel</button>
                </div>
                
            </form>
        </div>
    </div>
</div>