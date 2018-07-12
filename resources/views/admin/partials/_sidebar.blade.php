<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('adminassets/img/user.png')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Admin</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

   <!-- Sidebar Menu -->
 <ul class="sidebar-menu" data-widget="tree">
  <li class="header">MENU</li>
  <li class="active"><a href="javascript:void(0)"><i class="fa fa-home"></i> <span>BERANDA</span></a></li>
  <li class="treeview">
      <a href="#">
        <i class="fa fa-group"></i> <span>Kompetisi</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          <small class="label pull-right bg-red">5</small>

        </span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="{{ url('/admin/kompetisi') }}"><i class="fa fa-angle-double-right"></i> Registrasi Baru
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li><a href="{{ url('/admin/adc') }}"><i class="fa fa-angle-double-right"></i> ADC</a></li>
        <li><a href="{{ url('/admin/wdc') }}"><i class="fa fa-angle-double-right"></i> WDC</a></li>
        <li><a href="{{ url('/admin/dc') }}"><i class="fa fa-angle-double-right"></i> DC</a></li>
      </ul>
    </li>
  <li class="treeview">
      <a href="#">
        <i class="fa fa-group"></i> <span>Event</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="{{ url('/admin/inbox') }}"><i class="fa fa-angle-double-right"></i> Registrasi Baru
          <span class="pull-right-container">
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li><a href="{{ url('/admin/workshop') }}"><i class="fa fa-angle-double-right"></i> Workshop</a></li>
        <li><a href="{{ url('/admin/talkshow') }}"><i class="fa fa-angle-double-right"></i> Talkshow</a></li>
        <li><a href="{{ url('/admin/seminar') }}"><i class="fa fa-angle-double-right"></i> Seminar</a></li>
      </ul>
    </li>
  <li><a href="javascript:void(0)"><i class="fa fa-sign-out"></i> <span>KELUAR</span></a></li>
</ul>
<!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
 
