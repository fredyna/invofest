<div class="modal fade in" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" action="{{ url('admin/postStore') }}" class="form-horizontal" enctype="multipart/form-data">
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
                        <label for="judul" class="col-md-3 control-label">Judul</label>
                        <div class="col-md-6">
                            <input type="text" id="judul" name="judul" placeholder="Judul Post" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                   
                    <div class="form-group">
                      <label for="gambar" class="col-md-3 control-label">Gambar</label>
                      <div class="col-md-6">
                        <image id="showgambar" src="#" width="250px" style="display : none;">
                        <br>
                        <input type="file" id="gambar" name="gambar" class="form-control">
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                     <div class="form-group">
                        <label for="deskripsi" class="col-md-3 control-label">Deskripsi</label>
                        <div class="col-md-9">
                            <textarea name="deskripsi" id="deskripsi" class="textarea" placeholder="Deskripsi Post" required
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            <span class="help-block with-errors"></span>
                        </div>
                      </div>

                <div class="modal-footer">
                    <button id="tombolsubmit" type="submit" class="btn btn-primary btn-flat">Submit</button>
                    <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Cancel</button>
                </div>
                
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('adminassets/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
$(document).ready(function(){
    $('#modal-form').on('shown.bs.modal', function(){
        $('#deskripsi').wysihtml5();
    });

    $('#modal-form').on('hidden.bs.modal', function(){
        $('.wysihtml5-sandbox, .wysihtml5-toolbar').remove();
        $('#deskripsi').show();
    });
});
  </script>