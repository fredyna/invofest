@extends('admin.default')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Media Partner
        <small>Media Publikasi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0)"><i class="fa fa-home"></i> Media Partner</a></li>
        <!--<li class="active">Here</li>-->
      </ol>
    </section>
  
    <!-- Main content -->
    <section class="content container-fluid">
  
        <div class="row">
            <div class="col-xs-12"> 
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Media </h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body table-responsive">
                  <table id="mediatable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id Post</th>
                        <th>Nama</th>
                        <th>logo</th>
                        <th>link</th>
                        <th>deskripsi</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        
                    </tbody>
                    
                  </table>
                  <a onclick="addForm()" class="btn btn-success">Tambah Media</a>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>
        </div>
          <!-- /.row -->
  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('admin.form.form-media')


  <script>

    var table = $('#mediatable').DataTable({
            processing: false,
            serverSide: true,
            ajax: {
                url: '{{ url("admin/api/media") }}'
            },
            columns: [
            {data: 'id', name: 'id'},
            {data: 'nama', name: 'nama'},
            {data: 'logo', name: 'logo'},
            {data: 'link', name: 'link'},
            {data: 'deskripsi', name: 'deskripsi'},
            {data: 'action', name: 'action'},
                      ]
                    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Tambah Media');
        $('#tombolsubmit').prop('style' , 'display : inline');
        $('#gambar').prop('required','true');
      }
    
      function deleteForm(id) {

        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
                swal({
          title: "Anda Yakin?",
          text: "Apakah anda yakin untuk menghapus data ini ?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yap",
          cancelButtonText: "Tidaaaaaaaaaak",
          closeOnConfirm: false,
          closeOnCancel: false
        }).then(function(result) {
          
            url = "{{ url('admin/mediaHapus') . '/' }}" + id;
            $.ajax({
                        url : url,
                        type : "get",
                        contentType: false,
                        processData: false,
                        success : function($data) {
                            table.ajax.reload();
                            swal(
                              'Berhasil!',
                              'Proses Data telah berhasil',
                              'success'
                            )

                            
                        },
                        error : function(){
                          alert("eror cuk");

                        }
                    });
          }).catch(swal.noop);
        }

        

      $(function(){
            $('#modal-form form').on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('admin/mediaStore') }}";
                    else url = "{{ url('admin/mediaUpdate') . '/' }}" + id;

                    $.ajax({
                        url : url,
                        type : "POST",
                        // data : $('#modal-form form').serialize(),
                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        success : function($data) {
                            $('#modal-form').modal('hide');
              
                            table.ajax.reload();
                            swal(
                              'Berhasil!',
                              'Proses Data telah berhasil',
                              'success'
                            )

                            
                        },
                        error : function(){
                          alert("eror cuk");

                        }
                    });
                    return false;
                }
            });
        });




      function editForm(id) {
        save_method = 'edit';
        // $('input[name=_method]').val('post');
        $('#modal-form form')[0].reset();
        
        $.ajax({
          url: "{{ url('admin/media') }}" + '/' + id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Konfirmasi Peserta');

            $('#id').val(data.id);
            $('#nama').val(data.nama);
            $('#link').val(data.link);
            $('#deskripsi').val(data.deskripsi);
            $('#showgambar').prop('src',data.logo).prop('style','display : inline;'); 
          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }

      </script>
  @endsection