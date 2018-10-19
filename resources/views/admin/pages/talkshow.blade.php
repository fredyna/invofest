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
                  <h3 class="box-title">Talkshow</h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body table-responsive">
                  <table id="tabletalkshow" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Nama Institusi</th>
                        <th>Mahasiswa / Umum</th>
                        <th>No.HP</th>
                        <th>Email</th>
                        <th>Jenis Pembayaran</th>
                        <th>Aksi</th>
                        <th>Absensi</th>
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
  @include('admin.form.form-detail')
  <script>
        var table = $('#tabletalkshow').DataTable({
            processing: false,
            serverSide: true,
            ajax: {
                url: '{{ url("admin/api/peserta/talkshow") }}'
            },
            columns: [
              {data: 'id_peserta', name: 'id_peserta'},
              {data: 'nama', name: 'nama'},
              {data: 'asal_institusi', name: 'asal_institusi'},
              {data: 'kategori', name: 'kategori'},
              {data: 'nomor_hp', name: 'nomor_hp'},
              {data: 'email', name: 'email'},
              {data: 'jenis_pembayaran', name: 'jenis_pembayaran'},
              {data: 'action', name: 'action'},
              {data: 'absensi', name: 'absensi'},
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

        $(function(){
            $('#modal-form form').on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('product') }}";
                    else url = "{{ url('admin/peserta/workshopupdate') . '/' }}" + id;

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
                          alert("eror , please kontak your it support :) ");
                        }
                    });
                    return false;
                }
            });
        });

        function detailForm(id) {
        save_method = 'edit';
        // $('input[name=_method]').val('post');
        $('#modal-form form')[0].reset();
        $('#tombolsubmit').prop('style' , 'display : none');
        $('#tomboledit').prop('style' , 'display : inline');
        $.ajax({
          url: "{{ url('admin/inbox') }}" + '/' + id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Konfirmasi Peserta');

            $('#id').val(data.id_peserta);
            var bln = ["Januari", "Februari", "Maret", "April", 
                        "Mei", "Juni", "Juli", "Agustus",
                        "September", "Oktober", "November", "Desember"];
            var tgl = new Date(data.created_at);
            $('#tanggal').val(tgl.getDate()+' '+bln[tgl.getMonth()]+' '+tgl.getFullYear()).prop('disabled', true);
            $('#nama').val(data.nama).prop('disabled',true);
            $('#kategori').val(data.kategori).prop('disabled',true);
            $('#asal_institusi').val(data.asal_institusi).prop('disabled',true);
            $('#nomor_hp').val(data.nomor_hp).prop('disabled',true);
            $('#email').val(data.email).prop('disabled',true);
            $('#seminar').val(data.seminar).prop('disabled',true);
            $('#workshop').val(data.workshop).prop('disabled',true);
            $('#talkshow').val(data.talkshow).prop('disabled',true);
            $('#jenis_pembayaran').val(data.jenis_pembayaran).prop('disabled',true);
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

            if (data.kategori == 'Umum'){
              var hseminar = 100000;
              var hworkshop = 100000;
              var htalkshow = 100000;
              var bayar = (data.talkshow * htalkshow) + (data.seminar * hseminar) + (data.workshop * hworkshop);
              $('#ktm').hide();
              $('#foto_ktm').prop('src',"{{asset('img/foto_ktm/1.jpg')}}")
              $('#bayar').empty();
              $('#bayar').append("Total Bayar = Rp." + bayar);
            }else{
              var hseminar = 75000;
              var hworkshop = 75000;
              var htalkshow = 75000;
              var bayar = (data.talkshow * htalkshow) + (data.seminar * hseminar) + (data.workshop * hworkshop);
              $('#bayar').empty();
              $('#bayar').append("Total Bayar = Rp." + bayar);
              $("#link_foto_ktm").prop('href',"{{ asset('uploads/ktm') }}"+"/"+ data.foto_ktm);
              $('#foto_ktm').prop('src',"{{ asset('uploads/ktm') }}"+"/"+ data.foto_ktm);
              $('#ktm').show();
            }

          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }

      function absensiForm(id) {
        save_method = 'edit';
        // $('input[name=_method]').val('post');
        $('#modal-form form')[0].reset();
        $('#tombolsubmit').prop('style' , 'display : none');
        $('#tomboledit').prop('style' , 'display : none');
        $('#tombolabsen').prop('style' , 'display : inline');
        $.ajax({
          url: "{{ url('admin/inbox') }}" + '/' + id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Konfirmasi Peserta');

            $('#id').val(data.id_peserta);
            var bln = ["Januari", "Februari", "Maret", "April", 
                        "Mei", "Juni", "Juli", "Agustus",
                        "September", "Oktober", "November", "Desember"];
            var tgl = new Date(data.created_at);
            $('#tanggal').val(tgl.getDate()+' '+bln[tgl.getMonth()]+' '+tgl.getFullYear()).prop('disabled', true);
            $('#nama').val(data.nama).prop('disabled',true);
            $('#kategori').val(data.kategori).prop('disabled',true);
            $('#asal_institusi').val(data.asal_institusi).prop('disabled',true);
            $('#nomor_hp').val(data.nomor_hp).prop('disabled',true);
            $('#email').val(data.email).prop('disabled',true);
            $('#seminar').val(data.seminar).prop('disabled',true);
            $('#workshop').val(data.workshop).prop('disabled',true);
            $('#talkshow').val(data.talkshow).prop('disabled',true);
            $('#jenis_pembayaran').val(data.jenis_pembayaran).prop('disabled',true);
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

            if (data.kategori == 'Umum'){
              var hseminar = 100000;
              var hworkshop = 100000;
              var htalkshow = 100000;
              var bayar = (data.talkshow * htalkshow) + (data.seminar * hseminar) + (data.workshop * hworkshop);
              $('#ktm').hide();
              $('#foto_ktm').prop('src',"{{asset('img/foto_ktm/1.jpg')}}")
              $('#bayar').empty();
              $('#bayar').append("Total Bayar = Rp." + bayar);
            }else{
              var hseminar = 75000;
              var hworkshop = 75000;
              var htalkshow = 75000;
              var bayar = (data.talkshow * htalkshow) + (data.seminar * hseminar) + (data.workshop * hworkshop);
              $('#bayar').empty();
              $('#bayar').append("Total Bayar = Rp." + bayar);
              $("#link_foto_ktm").prop('href',"{{ asset('uploads/ktm') }}"+"/"+ data.foto_ktm);
              $('#foto_ktm').prop('src',"{{ asset('uploads/ktm') }}"+"/"+ data.foto_ktm);
              $('#ktm').show();
            }

          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }


      function editForm() {
        $('#tombolsubmit').prop('style' , 'display : inline');
        $('#tomboledit').prop('style' , 'display : none');
        $('#nama').prop('disabled',false);
            $('#kategori').prop('disabled',false);
            $('#asal_institusi').prop('disabled',false);
            $('#nomor_hp').prop('disabled',false);
            $('#email').prop('disabled',false);
            $('#seminar').prop('disabled',false);
            $('#workshop').prop('disabled',false);
            $('#talkshow').prop('disabled',false);
            $('#jenis_pembayaran').prop('disabled',false);
            $('#kategori_workshop').prop('disabled',false);
            
      }


      function absensiForm(id) {

event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
  title: "Hadir Talkshow ?",
  text: "anda yakin untuk konfirmasi kehadiran ?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#00a65a",
  confirmButtonText: "Hadir",
  cancelButtonText: "Tidaaaaaaaaaak",
  closeOnConfirm: false,
  closeOnCancel: false
}).then(function(result) {
  
    url = "{{ url('admin/absensiTalkshow') . '/' }}" + id;
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
      </script>
  @endsection