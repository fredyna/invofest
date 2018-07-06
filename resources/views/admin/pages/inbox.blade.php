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

                <div class="box-body">
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

  @include('admin.form.form-inbox')

  <script>

$(function() {
        var oTable = $('#example2').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url("admin/api/peserta") }}'
            },
            columns: [
            {data: 'id_peserta', name: 'id_peserta'},
            {data: 'nama', name: 'nama'},
            {data: 'asal_institusi', name: 'asal_institusi'},
            {data: 'foto_ktm', name: 'foto_ktm'},
            {data: 'nomor_hp', name: 'nomor_hp'},
            {data: 'talkshow', name: 'talkshow'},
            {data: 'seminar', name: 'seminar'},
            {data: 'workshop', name: 'workshop'},
            {data: 'kategori_workshop', name: 'kategori_workshop'},
            {data: 'action', name: 'action'},
    
        ],
        });
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Tambah Peserta');
      }

      function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{ url('admin/inbox') }}" + '/' + id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Konfirmasi Peserta');

            $('#id').val(data.id);
            $('#nama').val(data.nama);
            $('#asal_institusi').val(data.asal_institusi);
            $('#nomor_hp').val(data.nomor_hp);
            $('#email').val(data.email);
            $('#seminar').val(data.seminar);
            $('#workshop').val(data.workshop);
            $('#kategori_workshop').val(data.kategori_workshop);
            $('#keterangan').val(data.keterangan);
          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }

      </script>
  @endsection