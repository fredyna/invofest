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
  <li class="active"><a href="{{ route('admin') }}"><i class="fa fa-home"></i> <span>BERANDA</span></a></li>
  <li class="treeview">
      <a href="#">
        <i class="fa fa-trophy"></i> <span>Kompetisi</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          <small class="label pull-right bg-red" id="kompetisihitung" style="display:none"></small>

        </span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="{{ url('/admin/kompetisi') }}"><i class="fa fa-angle-double-right"></i> Registrasi Baru
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-red" id="kompetisihitung1" style="display:none"></small>
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
          <small class="label pull-right bg-red" id="acarahitung" style="display:none"></small>
        </span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="{{ url('/admin/inbox') }}"><i class="fa fa-angle-double-right"></i> Registrasi Baru
          <span class="pull-right-container">
              <small class="label pull-right bg-red" id="acarahitung1"></small>
            </span>
          </a>
        </li>
        <li><a href="{{ url('/admin/workshop') }}"><i class="fa fa-angle-double-right"></i> Workshop</a></li>
        <li><a href="{{ url('/admin/talkshow') }}"><i class="fa fa-angle-double-right"></i> Talkshow</a></li>
        <li><a href="{{ url('/admin/seminar') }}"><i class="fa fa-angle-double-right"></i> Seminar</a></li>
      </ul>
    </li>
    <li><a href="{{ url('/admin/post') }}"><i class="fa fa-list"></i> <span>Post</span></a></li>
    <li><a href="{{ url('/admin/sponsor') }}"><i class="fa fa-credit-card"></i> <span>Sponsor</span></a></li>
    <li><a href="{{ url('/admin/media') }}"><i class="fa fa-handshake-o"></i> <span>Media Partner</span></a></li>
  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
</ul>
<!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
 

<script>
function Hitung() {
        // save_method = 'edit';
        // $('input[name=_method]').val('post');
        // $('#modal-form form')[0].reset();
        
        $.ajax({
          url: "{{ url('admin/api/hitung') }}",
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            

            if(data.kompetisi > 0){
              $('#kompetisihitung').text(data.kompetisi).prop('style','display : inline');
              $('#kompetisihitung1').text(data.kompetisi).prop('style','display : inline');  
            }else if (data.peserta > 0){
              $('#acarahitung').text(data.peserta).prop('style','display : inline');
              $('#acarahitung1').text(data.peserta).prop('style','display : inline');
            }
            else{
              $('#kompetisihitung').text(data.kompetisi).prop('style','display : none');
              $('#kompetisihitung1').text(data.kompetisi).prop('style','display : none');
              $('#acarahitung').text(data.peserta).prop('style','display : none');
              $('#acarahitung1').text(data.peserta).prop('style','display : none');

            }
          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }

Hitung(); // This will run on page load
setInterval(function(){
    Hitung() // this will run after every 5 seconds
}, 5000);

</script>
