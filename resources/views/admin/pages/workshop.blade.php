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
                  <h3 class="box-title">Data Workshop</h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Nama Institusi</th>
                        <th>Mahasiswa / Umum</th>
                        <th>No.HP</th>
                        <th>Kategori Workshop</th>
                        <th>Konfirmasi</th>
                      </tr>
                    </thead>
                    <tbody>

                        <?php 
                            $kategori = 'mahasiswa';
                            $workshop = "Web Services"
                            ?>
                       
                        <tr <?php if ($workshop == 'UI/UX Design') {
                            echo 'class="bg-maroon"';
                        } elseif ($workshop == 'Web Services') {
                            echo 'class="bg-purple"';
                        } elseif($workshop == 'Cyber Security'){
                            echo 'class="bg-navy"';
                        }else {
                            echo 'class="bg-olive"';
                        }?>
                         >
                                <td>001</td>
                                <td>Bayu Adi Prasetiyo</td>
                                <td>University Of Singapore</td>
                                <td>
                                    <?php if($kategori == 'mahasiswa'){
                                        echo '<a class="label label-warning">mahasiswa</a>';
                                    }else {
                                        echo '<a class="label label bg-purple">umum</a>';
                                    }?>
                                </td>
                                <td>085643281795</td>
                                <td><?php echo $workshop; ?></td>
                                <td> <a class="btn btn-info" href="#">Detail</a> </td>
                            </tr>
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

  <script>
        $(function () {
          $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
        })
      </script>
  @endsection