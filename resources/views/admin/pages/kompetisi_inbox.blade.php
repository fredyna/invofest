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
                  <h3 class="box-title">Registrasi Kompetisi Baru</h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                  <table id="kompetisiinbox" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id Peserta</th>
                        <th>Jenis Lomba</th>
                        <th>Nama Tim</th>
                        <th>Asal Sekolah / PT</th>
                        <th>Nama Ketua</th>
                        <th>Nama Anggota 1</th>
                        <th>Nama Anggota 2</th>
                        <th>Email Ketua</th>
                        <th>Konfirmasi</th>
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

  @include('admin.form.konfirmasi-kompetisi')

  <script>



    var table = $('#kompetisiinbox').DataTable({
            processing: false,
            serverSide: true,
            ajax: {
                url: '{{ url("admin/api/kompetisi") }}'
            },
            columns: [
            {data: 'id', name: 'id'},
            {data: 'jenis_lomba', name: 'jenis_lomba'},
            {data: 'nama_tim', name: 'nama_tim'},
            {data: 'asal_sekolah', name: 'asal_sekolah'},
            {data: 'nama_ketua_tim', name: 'nama_ketua_tim'},
            {data: 'nama_anggota_1', name: 'nama_anggota_1'},
            {data: 'nama_anggota_2', name: 'nama_anggota_2'},
            {data: 'email_ketua_tim', name: 'email_ketua_tim'},
            {data: 'action', name: 'action'},
                      ]
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
          url: "{{ url('admin/kompetisi') }}" + '/' + id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Konfirmasi Peserta');

            $('#id').val(data.id_peserta);
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

            if (data.kategori == 'umum'){
              var hseminar = 100000;
              var hworkshop = 100000;
              var htalkshow = 100000;
              var bayar = (data.talkshow * htalkshow) + (data.seminar * hseminar) + (data.workshop * hworkshop);
              $('#ktm').prop('hidden',true);
              $('#foto_ktm').prop('src',"{{asset('img/foto_ktm/1.jpg')}}")
              $('#bayar').empty();
              $('#bayar').append("Total Bayar = Rp." + bayar);
            }else{
              var hseminar = 75000;
              var hworkshop = 50000;
              var htalkshow = 50000;
              var bayar = (data.talkshow * htalkshow) + (data.seminar * hseminar) + (data.workshop * hworkshop);
              $('#bayar').empty();
              $('#bayar').append("Total Bayar = Rp." + bayar);
              $('#ktm').prop('hidden',false);
              // $('#foto_ktm').prop('src',"{{asset('img/foto_ktm/')}}" + data.foto_ktm)
            }

          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }

      </script>
  @endsection