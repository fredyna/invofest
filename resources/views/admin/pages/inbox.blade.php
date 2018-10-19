@extends('admin.default')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        BERANDA
        <small>Beranda</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0)"><i class="fa fa-home"></i> Beranda</a></li>
        <!--<li class="active">Here</li>-->
      </ol>
    </section>
  
    <!-- Main content -->
    <section class="content container-fluid">
  
        <div class="row">
            <div class="col-xs-12"> 
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Registrasi Acara Baru</h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body table-responsive">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id Peserta</th>
                        <th>Nama</th>
                        <th>asal Institusi</th>
                        <th>Mahasiswa / Umum</th>
                        <th>No.HP</th>
                        <th>Talkshow</th>
                        <th>Seminar</th>
                        <th>Workshop</th>
                        <th>Kategori Workshop</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                        
                    </tbody>
                  </table>
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

  @include('admin.form.form-inbox')

  <script>



    var table = $('#example2').DataTable({
            processing: false,
            serverSide: true,
            ajax: {
                url: '{{ url("admin/api/peserta") }}'
            },
            columns: [
              {data: 'id_peserta', name: 'id_peserta'},
              {data: 'nama', name: 'nama'},
              {data: 'asal_institusi', name: 'asal_institusi'},
              {data: 'kategori', name: 'kategori'},
              {data: 'nomor_hp', name: 'nomor_hp'},
              {data: 'talkshow', name: 'talkshow'},
              {data: 'seminar', name: 'seminar'},
              {data: 'workshop', name: 'workshop'},
              {data: 'kategori_workshop', name: 'kategori_workshop'},
              {data: 'action', name: 'action'},
            ],
            lengthMenu: [
                [ 10, 25, 50, 100, 200, -1 ],
                [ '10', '25', '50', '100', '200', 'Show all' ]
            ],
            dom: 'lBfrtip',  
            buttons: [  
              'excel'  
            ],
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Tambah Peserta');
      }


      $(function(){
            $('#modal-form form').on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('product') }}";
                    else url = "{{ url('admin/peserta/konfirmasi') . '/' }}" + id;

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
                            alert('Berhasil');

                            
                        },
                        error : function(){
                          alert("eror cuk");
                        }
                    });
                    return false;
                }
            });
        });

      function konfirmForm(id) {
        save_method = 'edit';
        // $('input[name=_method]').val('post');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{ url('admin/inbox') }}" + '/' + id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Konfirmasi Peserta');

            $('#id').val(data.id_peserta);
            $('#tanggal').val(data.created_at).prop('disabled',true);
            $('#nama').val(data.nama).prop('disabled',true);
            $('#kategori').val(data.kategori).prop('disabled',true);
            $('#asal_institusi').val(data.asal_institusi).prop('disabled',true);
            $('#nomor_hp').val(data.nomor_hp).prop('disabled',true);
            $('#email').val(data.email).prop('disabled',true);
            $('#seminar').val(data.seminar).prop('disabled',true);
            $('#workshop').val(data.workshop).prop('disabled',true);
            $('#talkshow').val(data.talkshow).prop('disabled',true);
            $('#kategori_workshop').val(data.kategori_workshop).prop('disabled',true);
            
            if (data.seminar =='1'){
              $('#seminar').prop('checked',true);
            }else{
              $('#seminar').prop('checked',false);
            }

            if (data.workshop =='1'){
              $('#workshop').prop('checked',true);
            }else{
              $('#workshop').prop('checked',false);
            }

            if (data.talkshow =='1'){
              $('#talkshow').prop('checked',true);
            }else{
              $('#talkshow').prop('checked',false);
            }

            var hseminar = 0;
            var hworkshop = 0;
            var htalkshow = 0;
            var bayar = 0;
            var img_url = '{{ asset('uploads/ktm') }}';

            if (data.kategori == 'Umum'){
              var hseminar = 100000;
              var hworkshop = 100000;
              var htalkshow = 50000;
              var bayar = (data.talkshow * htalkshow) + (data.seminar * hseminar) + (data.workshop * hworkshop);
              $('#ktm').hide();
              $('#bayar').empty();
              $('#bayar').append("Total Bayar = Rp " + bayar + ",-");
            }else{
              var hseminar = 75000;
              var hworkshop = 75000;
              var htalkshow = 30000;
              var bayar = (data.talkshow * htalkshow) + (data.seminar * hseminar) + (data.workshop * hworkshop);
              $('#bayar').empty();
              $('#bayar').append("Total Bayar = Rp " + bayar + ",-");
              $('#ktm').show();
              $('#foto_ktm').prop('src', img_url + "/" + data.foto_ktm);
            }

          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }

      </script>
  @endsection