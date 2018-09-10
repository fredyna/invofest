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
  
    {{--  <!-- Main content -->
    <section class="content container-fluid">
  
        <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>250</h3>
    
                  <p>Talkshow</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>120<sup style="font-size: 20px">%</sup></h3>
    
                  <p>Workshop</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>44</h3>
    
                  <p>IT Competition</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>120</h3>
    
                  <p>Seminar</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
  
    </section>
    <!-- /.content -->  --}}


    <!-- Peserta Kompetisi -->
    <section class="content container-fluid">
  
        <div class="row">
            <div class="col-xs-12"> 
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Peserta Kompetisi</h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                  
                  <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-navy">
                      <div class="inner">
                        <h3>{{ $adc }}</h3>
          
                        <p>ADC</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-maroon">
                      <div class="inner">
                        <h3>{{ $wdc }}</h3>
          
                        <p>WDC</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                      <div class="inner">
                        <h3>{{ $dpc }}</h3>
          
                        <p>DPC</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>
        </div>
          <!-- /.row -->
  
    </section>
    <!-- /.content -->

    <!-- Peserta Workshop -->
    <section class="content container-fluid">
  
        <div class="row">
            <div class="col-xs-12"> 
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Peserta Workshop</h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                  
                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-maroon">
                      <div class="inner">
                        <h3>{{ $ws_uxd }}</h3>
          
                        <p>UX Design</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-navy">
                      <div class="inner">
                        <h3>{{ $ws_ds }}</h3>
          
                        <p>Data Science</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-olive">
                      <div class="inner">
                        <h3>{{ $ws_cs }}</h3>
          
                        <p>Cyber Security</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                      <div class="inner">
                        <h3>{{ $ws_ws }}</h3>
          
                        <p>Web Services</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>
        </div>
          <!-- /.row -->
  
    </section>
    <!-- /.content -->

    <!-- Peserta Seminar dan Talkshow -->
    <section class="content container-fluid">
  
        <div class="row">
            <div class="col-xs-12"> 
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Peserta Seminar dan Talkshow</h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                  
                  <div class="col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-navy">
                      <div class="inner">
                        <h3>{{ $seminar }}</h3>
          
                        <p>Seminar</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                      <div class="inner">
                        <h3>{{ $talkshow }}</h3>
          
                        <p>Talkshow</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                    </div>
                  </div>

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

  

  @endsection