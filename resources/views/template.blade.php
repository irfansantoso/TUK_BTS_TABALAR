<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TUK BTS TABALAR</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('admin/dist/img/favicon.ico') }}">
  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">

  <style>
  /* Chrome, Safari, Edge, Opera */
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }
  </style>

  <style type="text/css">
 
  .preloader {
   
    position: fixed;
   
    top: 0;
   
    left: 0;
   
    width: 100%;
   
    height: 100%;
   
    z-index: 9999;
   
    background-color: rgba(0,0,0,0.5);
   
  }
   
  .preloader .loading {
   
    position: absolute;
   
    left: 50%;
   
    top: 50%;
   
    transform: translate(-50%,-50%);
   
    font: 14px arial;
   
  }

  /* animasi text hedaer */

  .animation {
    height:50px;
    overflow:hidden;
    margin-left: 1rem;
  }

  .animation > div > div {
    padding: 0.55rem 0.75rem;
    height:2.81rem;
    margin-bottom: 3.81rem;
    display:inline-block;
  }

  .animation div:first-child {
    animation: text-animation 8s infinite;
  }

  .first div {
    font-size: 2.26rem;
    text-transform: uppercase;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color:#D77FA1;
    color: white;
  }
  .second div {
    font-size: 2.26rem;
    text-transform: uppercase;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color:#F8B195;
    color: white;
  }

  @keyframes text-animation {
    0% {margin-top: 0;}
    10% {margin-top: 0;}
    20% {margin-top: -5.62rem;}
    30% {margin-top: -5.62rem;}
    
    70% {margin-top: -5.62rem;}
    80% {margin-top: -5.62rem;}
    90% {margin-top: 0;}
    100% {margin-top: 0;}
  }
   
  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">        
        <section class="animation">
          <div class="second"><div><h5>Periode Aktif {{ App\Http\Controllers\UserController::getKodePeriodeOperasional(); }}</h5></div></div>
          <div class="first"><div><h5>@yield('title', $title)</h5></div></div>          
        </section>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" title="Fullscreen" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" title="Logout" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->
  

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{asset('admin/dist/img/BTS_LOGO.png')}}" alt="Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">TUK BTS TABALAR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <a href="{{ route('profile') }}">
          <div class="image">
            @auth
              @if(Auth::user()->photo_img != "")
                <img src="@auth{{asset('photos/'.Auth::user()->photo_img)}}@endauth" class="img-circle elevation-2" alt="User Image">
              @else
                <img src="{{asset('admin/dist/img/person.png')}}" class="img-circle elevation-2" alt="User Image">
              @endif
              @endauth
          </div>
          @auth
            {{ Auth::user()->name }}
          @endauth
        </a>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar text-sm nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="{{ request()->is('lokasi', 'tongkang', 'kayu','driver','unitAlat','chainsaw','kupas','keperluan','helper') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
            <a href="#" class="{{ request()->is('lokasi', 'tongkang', 'kayu','driver','unitAlat','chainsaw','kupas','keperluan','helper') ? 'nav-link active' : 'nav-link' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('lokasi') }}" class="{{ request()->is('lokasi') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lokasi</p>
                </a>
              </li>
              @auth
              @if(Auth::user()->level == "administrator")
              <li class="nav-item">
                <a href="{{ route('tongkang') }}" class="{{ request()->is('tongkang') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tongkang (not used)</p>
                </a>
              </li>
              @endif
              @endauth
              <li class="nav-item">
                <a href="{{ route('kayu') }}" class="{{ request()->is('kayu') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kayu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('driver') }}" class="{{ request()->is('driver') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Driver</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('unitAlat') }}" class="{{ request()->is('unitAlat') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Alat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('chainsaw') }}" class="{{ request()->is('chainsaw') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chainsaw</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kupas') }}" class="{{ request()->is('kupas') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kupas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('keperluan') }}" class="{{ request()->is('keperluan') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Keperluan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('helper') }}" class="{{ request()->is('helper') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Helper</p>
                </a>
              </li>
            </ul>
          </li>
          
        
          <li class="{{ request()->is('trHeaderTpn','trDetailTpn/*','trHeaderTpnOut','trDetailTpnOut/*','trHeaderTpnOutLogpond','trDetailTpnOutLogpond/*','trHeaderTpkOutLogpond','trDetailTpkOutLogpond/*','trHeaderLogpondOutTongkang','trDetailLogpondOutTongkang/*','trTongkang','trLogListTkg/*','trHistory','periodeOperasional','users') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
            <a href="#" class="{{ request()->is('trHeaderTpn','trDetailTpn/*','trHeaderTpnOut','trDetailTpnOut/*','trHeaderTpnOutLogpond','trDetailTpnOutLogpond/*','trHeaderTpkOutLogpond','trDetailTpkOutLogpond/*','trHeaderLogpondOutTongkang','trDetailLogpondOutTongkang/*','trTongkang','trLogListTkg/*','trHistory','periodeOperasional','users') ? 'nav-link active' : 'nav-link' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Inputan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="{{ request()->is('trHeaderTpn','trDetailTpn/*','trHeaderTpnOut','trDetailTpnOut/*','trHeaderTpnOutLogpond','trDetailTpnOutLogpond/*') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
                <a href="#" class="nav-link">
                  <i class="{{ request()->is('trHeaderTpn','trDetailTpn/*','trHeaderTpnOut','trDetailTpnOut/*','trHeaderTpnOutLogpond','trDetailTpnOutLogpond/*') ? 'fas fa-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>TPN <i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('trHeaderTpn') }}" class="{{ request()->is('trHeaderTpn','trDetailTpn/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="{{ request()->is('trHeaderTpn','trDetailTpn/*') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                      <p>IN </p>    
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('trHeaderTpnOut') }}" class="{{ request()->is('trHeaderTpnOut','trDetailTpnOut/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="{{ request()->is('trHeaderTpnOut','trDetailTpnOut/*') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                      <p>OUT - TPK</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('trHeaderTpnOutLogpond') }}" class="{{ request()->is('trHeaderTpnOutLogpond','trDetailTpnOutLogpond/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="{{ request()->is('trHeaderTpnOutLogpond','trDetailTpnOutLogpond/*') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                      <p>OUT - LOGPOND</p>
                    </a>
                  </li>                             
                </ul>
              </li>
              
              <li class="{{ request()->is('trHeaderTpkOutLogpond','trDetailTpkOutLogpond/*') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
                <a href="#" class="nav-link">
                  <i class="{{ request()->is('trHeaderTpkOutLogpond','trDetailTpkOutLogpond/*') ? 'fas fa-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>TPK<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
    
                  <li class="nav-item">
                    <a href="{{ route('trHeaderTpkOutLogpond') }}" class="{{ request()->is('trHeaderTpkOutLogpond','trDetailTpkOutLogpond/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="{{ request()->is('trHeaderTpkOutLogpond','trDetailTpkOutLogpond/*') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                      <p>TPK ke LOGPOND</p>
                    </a>
                  </li>                                
                </ul>
              </li>
              <li class="{{ request()->is('trHeaderLogpondOutTongkang','trDetailLogpondOutTongkang/*','trTongkang','trLogListTkg/*') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
                <a href="#" class="nav-link">
                  <i class="{{ request()->is('trHeaderLogpondOutTongkang','trDetailLogpondOutTongkang/*','trTongkang','trLogListTkg/*') ? 'fas fa-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>LOGPOND<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">                  
                  <li class="nav-item">
                    <a href="{{ route('trHeaderLogpondOutTongkang') }}" class="{{ request()->is('trHeaderLogpondOutTongkang','trDetailLogpondOutTongkang/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="{{ request()->is('trHeaderLogpondOutTongkang','trDetailLogpondOutTongkang/*') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                      <p>LPO ke Tongkang</p>
                    </a>
                  </li>                  
                  <li class="nav-item">
                    <a href="{{ route('trTongkang') }}" class="{{ request()->is('trTongkang','trLogListTkg/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="{{ request()->is('trTongkang','trLogListTkg/*') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                      <p>Tongkang</p>
                    </a>
                  </li>             
                </ul>
              </li>
              <hr>
              <li class="nav-item">
                <a href="{{ route('trHistory') }}" class="{{ request()->is('trHistory') ? 'nav-link active' : 'nav-link' }}">
                  <i class="{{ request()->is('trHistory') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('periodeOperasional') }}" class="{{ request()->is('periodeOperasional') ? 'nav-link active' : 'nav-link' }}">
                  <i class="{{ request()->is('periodeOperasional') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>Periode Operasional</p>
                </a>
              </li>
              @auth
              @if(Auth::user()->level == "administrator")
              <li class="nav-item">
                <a href="{{ route('users') }}" class="{{ request()->is('users') ? 'nav-link active' : 'nav-link' }}">
                  <i class="{{ request()->is('users') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>Users</p>
                </a>
              </li>              
              @endif
              @endauth
            </ul>
          </li>
          <li class="{{ request()->is('rptStokKayu','rptStokPerThn','rptStokPerThnDia','rptChainTrack','rptLoglistLoc','rptStokLoc','rptStokLocDet','rptRekapHauling','rptRekapTkg','rptRekapPerlokPertahun','rptStokAkhGab') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
            <a href="#" class="{{ request()->is('rptStokKayu','rptStokPerThn','rptStokPerThnDia','rptChainTrack','rptLoglistLoc','rptStokLoc','rptStokLocDet','rptRekapHauling','rptRekapTkg','rptRekapPerlokPertahun','rptStokAkhGab') ? 'nav-link active' : 'nav-link' }}">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('rptStokKayu') }}" class="{{ request()->is('rptStokKayu') ? 'nav-link active' : 'nav-link' }}">
                  <i class="{{ request()->is('rptStokKayu') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>Stok Kayu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptStokPerThn') }}" class="{{ request()->is('rptStokPerThn') ? 'nav-link active' : 'nav-link' }}">
                  <i class="{{ request()->is('rptStokPerThn') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>Stok Kayu Per Thn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptStokPerThnDia') }}" class="{{ request()->is('rptStokPerThnDia') ? 'nav-link active' : 'nav-link' }}">
                  <i class="{{ request()->is('rptStokPerThnDia') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>Stok(Diameter) Per Thn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptChainTrack') }}" class="{{ request()->is('rptChainTrack') ? 'nav-link active' : 'nav-link' }}">
                  <i class="{{ request()->is('rptChainTrack') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>Cs - Trktr - Kps - Hpr</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptLoglistLoc') }}" class="{{ request()->is('rptLoglistLoc') ? 'nav-link active' : 'nav-link' }}">
                  <i class="{{ request()->is('rptLoglistLoc') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>Loglist</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptStokLoc') }}" class="{{ request()->is('rptStokLoc') ? 'nav-link active' : 'nav-link' }}">
                  <i class="{{ request()->is('rptStokLoc') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>Stok Lokasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptStokLocDet') }}" class="{{ request()->is('rptStokLocDet') ? 'nav-link active' : 'nav-link' }}">
                  <i class="{{ request()->is('rptStokLocDet') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>Stok Lokasi Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptRekapHauling') }}" class="{{ request()->is('rptRekapHauling') ? 'nav-link active' : 'nav-link' }}">
                  <i class="{{ request()->is('rptRekapHauling') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>Rekap Hauling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptRekapTkg') }}" class="{{ request()->is('rptRekapTkg') ? 'nav-link active' : 'nav-link' }}">
                  <i class="{{ request()->is('rptRekapTkg') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>Rekap Tongkang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptRekapPerlokPertahun') }}" class="{{ request()->is('rptRekapPerlokPertahun') ? 'nav-link active' : 'nav-link' }}">
                  <i class="{{ request()->is('rptRekapPerlokPertahun') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>Rekap Perlokasi Pertahun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptStokAkhGab') }}" class="{{ request()->is('rptStokAkhGab') ? 'nav-link active' : 'nav-link' }}">
                  <i class="{{ request()->is('rptStokAkhGab') ? 'far fa-check-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                  <p>Stok Akhir Gabungan</p>
                </a>
              </li>
            </ul>
          </li>          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        @yield('content')      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="preloader">
    <div class="loading">
      <img src="{{asset('admin/dist/img/loading.gif')}}" width="80">
      <p>Harap Tunggu</p>
    </div>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2023 <a href="https://www.btj.co.id">IT-BTJ</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('admin/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('admin/plugins/bootstrap-confirm-delete.js')}}"></script>
<script src="{{asset('admin/plugins/chartJs/chart.js')}}"></script>
<script src="{{asset('admin/plugins/chartJs/chartjs-plugin-datalabels.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('admin/dist/js/demox.js')}}"></script> --}}

<script type="text/javascript">

  var labels = @json($dataLogg['labels'] ?? []);
  var dataValues = @json($dataLogg['dataValues'] ?? []);
  var totalVolumes = @json($dataLogg['totalVolumes'] ?? []).map(volume => Number(volume).toFixed(2) + ' m³');


  var labelsWithVolumes = labels.map((label, index) => label + ' (' + totalVolumes[index] + ')');

  const data = {
    labels: labelsWithVolumes,
    datasets: [{
      label: 'TPN',
      backgroundColor: [
        'rgba(255, 0, 0, 0.2)',
        'rgba(0, 255, 0, 0.2)',
        'rgba(0, 0, 255, 0.2)',
        'rgba(255, 255, 0, 0.2)',
        'rgba(255, 0, 255, 0.2)',
        'rgba(0, 255, 255, 0.2)',
        'rgba(128, 0, 0, 0.2)',
        'rgba(0, 128, 0, 0.2)',
        'rgba(0, 0, 128, 0.2)',
        'rgba(255, 165, 0, 0.2)'],
      borderColor: [
        'rgb(255, 0, 0)',
        'rgb(0, 255, 0)',
        'rgb(0, 0, 255)',
        'rgb(255, 255, 0)',
        'rgb(255, 0, 255)',
        'rgb(0, 255, 255)',
        'rgb(128, 0, 0)',
        'rgb(0, 128, 0)',
        'rgb(0, 0, 128)',
        'rgb(255, 165, 0)'],
      borderWidth: 1,
      data: dataValues,
      datalabels: {
         anchor: 'end',
         align: 'end',
         formatter: (value, context) => value + ' Btg'
      },
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
        animation: {
        delay: (context) => context.dataIndex * 200, // Adjust delay duration as needed
      }
    },
    plugins: [ChartDataLabels],
  };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
  
</script>

<script type="text/javascript">

  var labels2 = @json($dataLogg2['labels'] ?? []);
  var dataValues2 = @json($dataLogg2['dataValues'] ?? []);
  var totalVolumes2 = @json($dataLogg2['totalVolumes'] ?? []).map(volume => Number(volume).toFixed(2) + ' m³');

  var labelsWithVolumes2 = labels2.map((label, index) => label + ' (' + totalVolumes2[index] + ')');

  const data2 = {
    labels: labelsWithVolumes2,
    datasets: [{
      label: 'TPK',
      backgroundColor: [
        'rgba(255, 0, 0, 0.2)',
        'rgba(0, 255, 0, 0.2)',
        'rgba(0, 0, 255, 0.2)',
        'rgba(255, 255, 0, 0.2)',
        'rgba(255, 0, 255, 0.2)',
        'rgba(0, 255, 255, 0.2)',
        'rgba(128, 0, 0, 0.2)',
        'rgba(0, 128, 0, 0.2)',
        'rgba(0, 0, 128, 0.2)',
        'rgba(255, 165, 0, 0.2)'],
      borderColor: [
        'rgb(255, 0, 0)',
        'rgb(0, 255, 0)',
        'rgb(0, 0, 255)',
        'rgb(255, 255, 0)',
        'rgb(255, 0, 255)',
        'rgb(0, 255, 255)',
        'rgb(128, 0, 0)',
        'rgb(0, 128, 0)',
        'rgb(0, 0, 128)',
        'rgb(255, 165, 0)'],
      borderWidth: 1,
      data: dataValues2,
      datalabels: {
         anchor: 'end',
         align: 'end',
         formatter: (value, context) => value + ' Btg'
      },
    }]
  };

  const config2 = {
    type: 'bar',
    data: data2,
    options: {
        animation: {
        delay: (context) => context.dataIndex * 200, // Adjust delay duration as needed
      }
    },
    plugins: [ChartDataLabels],
  };

  const myChart2 = new Chart(
    document.getElementById('myChart2'),
    config2
  );
  
</script>

<script type="text/javascript">

  var labels3 = @json($dataLogg3['labels'] ?? []);
  var dataValues3 = @json($dataLogg3['dataValues'] ?? []);
  var totalVolumes3 = @json($dataLogg3['totalVolumes'] ?? []).map(volume => Number(volume).toFixed(2) + ' m³');

  var labelsWithVolumes3 = labels3.map((label, index) => label + ' (' + totalVolumes3[index] + ')');

  const data3 = {
    labels: labelsWithVolumes3,
    datasets: [{
      label: 'LOGPOND',
      backgroundColor: [
        'rgba(255, 0, 0, 0.2)',
        'rgba(0, 255, 0, 0.2)',
        'rgba(0, 0, 255, 0.2)',
        'rgba(255, 255, 0, 0.2)',
        'rgba(255, 0, 255, 0.2)',
        'rgba(0, 255, 255, 0.2)',
        'rgba(128, 0, 0, 0.2)',
        'rgba(0, 128, 0, 0.2)',
        'rgba(0, 0, 128, 0.2)',
        'rgba(255, 165, 0, 0.2)'],
      borderColor: [
        'rgb(255, 0, 0)',
        'rgb(0, 255, 0)',
        'rgb(0, 0, 255)',
        'rgb(255, 255, 0)',
        'rgb(255, 0, 255)',
        'rgb(0, 255, 255)',
        'rgb(128, 0, 0)',
        'rgb(0, 128, 0)',
        'rgb(0, 0, 128)',
        'rgb(255, 165, 0)'],
      borderWidth: 1,
      data: dataValues3,
      datalabels: {
         anchor: 'end',
         align: 'end',
         formatter: (value, context) => value + ' Btg'
      },
    }]
  };

  const config3 = {
    type: 'bar',
    data: data3,
    options: {
        animation: {
        delay: (context) => context.dataIndex * 200, // Adjust delay duration as needed
      }
    },
    plugins: [ChartDataLabels],
  };

  const myChart3 = new Chart(
    document.getElementById('myChart3'),
    config3
  );
  
</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "order": [],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#rptLogLoc").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "order": [],
      "buttons": []
    }).buttons().container().appendTo('#rptLogLoc_wrapper .col-md-6:eq(0)');    

    $('#trHeader').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('trHeaderTpn.data') !!}', // memanggil route yang menampilkan data json
        columns: 
        [
            { // mengambil & menampilkan kolom sesuai tabel database
                data: 'no_tpn',
                name: 'no_tpn'
            },
            {
                data: 'tgl_input_tpn',
                name: 'tgl_input_tpn'
            },
            {
                data: 'thn_produksi_tpn',
                name: 'thn_produksi_tpn'
            },
            {
                data: 'lokasi_tpn',
                name: 'lokasi_tpn'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false, 
                searchable: false
            }
        ],
    });
    

    $('#trHeaderOut').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('trHeaderTpnOut.data') !!}', // memanggil route yang menampilkan data json
        columns: 
        [
            { // mengambil & menampilkan kolom sesuai tabel database
                data: 'no_tpn_out',
                name: 'no_tpn_out'
            },
            {
                data: 'tgl_input_tpn_out',
                name: 'tgl_input_tpn_out'
            },
            {
                data: 'trip',
                name: 'trip'
            },
            {
                data: 'nama_lokasi',
                name: 'nama_lokasi'
            },
            {
                data: 'md',
                name: 'md'
            },
            {
                data: 'mua',
                name: 'mua'
            },
            {
                data: 'mdb',
                name: 'mdb'
            },
            {
                data: 'muab',
                name: 'muab'
            },
            {
                data: 'mda',
                name: 'mda'
            },
            {
                data: 'muaa',
                name: 'muaa'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false, 
                searchable: false
            }
        ],
        
    });

    $('#trHeaderOutLogpond').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('trHeaderTpnOutLogpond.data') !!}', // memanggil route yang menampilkan data json
        columns: 
        [
            { // mengambil & menampilkan kolom sesuai tabel database
                data: 'no_tpn_out',
                name: 'no_tpn_out'
            },
            {
                data: 'tgl_input_tpn_out',
                name: 'tgl_input_tpn_out'
            },
            {
                data: 'trip',
                name: 'trip'
            },
            {
                data: 'nama_lokasi',
                name: 'nama_lokasi'
            },
            {
                data: 'md',
                name: 'md'
            },
            {
                data: 'mua',
                name: 'mua'
            },
            {
                data: 'mdb',
                name: 'mdb'
            },
            {
                data: 'muab',
                name: 'muab'
            },
            {
                data: 'mda',
                name: 'mda'
            },
            {
                data: 'muaa',
                name: 'muaa'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false, 
                searchable: false
            }
        ],
        
    });
        

    $('#trHeaderLogpondOutTongkang').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('trHeaderLogpondOutTongkang.data') !!}', // memanggil route yang menampilkan data json
        columns: 
        [
            { // mengambil & menampilkan kolom sesuai tabel database
                data: 'no_tpn_out',
                name: 'no_tpn_out'
            },
            {
                data: 'tgl_input_tpn_out',
                name: 'tgl_input_tpn_out'
            },
            {
                data: 'trip',
                name: 'trip'
            },
            {
                data: 'nama_lokasi',
                name: 'nama_lokasi'
            },
            {
                data: 'md',
                name: 'md'
            },
            {
                data: 'mua',
                name: 'mua'
            },
            {
                data: 'kt',
                name: 'kt'
            },            
            {
                data: 'action',
                name: 'action',
                orderable: false, 
                searchable: false
            }
        ],
        
    });
    

    $('#trTongkang').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        ajax: '{!! route('trTongkang.data') !!}', // memanggil route yang menampilkan data json
        columns: 
        [
            { // mengambil & menampilkan kolom sesuai tabel database
                data: 'no_loglist',
                name: 'no_loglist'
            },
            { // mengambil & menampilkan kolom sesuai tabel database
                data: 'volall',
                name: 'volall'
            },
            {
                data: 'action',
                name: 'action'
            },
        ],
    });

    $('#trLoglistModal').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        // ajax: '{{ url("trLoglistModal")}}',
        ajax: '{!! route('trLoglistModal.data') !!}', // memanggil route yang menampilkan data json
        columns: 
        [
            { // mengambil & menampilkan kolom sesuai tabel database
                data: 'nolog',
                name: 'nolog'
            },
            {
                data: 'tpt',
                name: 'tpt'
            },
            {
                data: 'trk',
                name: 'trk'
            },
            {
                data: 'nk',
                name: 'nk'
            },
            {
                data: 'ptk',
                name: 'ptk'
            },
            {
                data: 'nobt',
                name: 'nobt'
            },
            {
                data: 'pj',
                name: 'pj'
            },
            {
                data: 'uj',
                name: 'uj'
            },
            {
                data: 'pk',
                name: 'pk'
            },
            {
                data: 'rt',
                name: 'rt'
            },
            {
                data: 'vl',
                name: 'vl'
            },
            {
                data: 'ct',
                name: 'ct'
            },
            {
                data: 'pc',
                name: 'pc'
            }
        ],
        
    });

    $('#trHistory').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        bLengthChange: false,
        order: [],
        ajax: '{!! route('trHistory.data') !!}', // memanggil route yang menampilkan data json
        dom: 'Blfrtip',
        buttons: [
             {
                 extend: 'pdf',
                 exportOptions: {
                     columns: [0,1,2] // Column index which needs to export
                 }
             },
             {
                 extend: 'csv',
                 exportOptions: {
                     columns: [0,1,2] // Column index which needs to export
                 }
             },
             {
                 extend: 'excel',
             },
             {
                  text: 'Reload',
                  action: function ( e, dt, node, config ) {
                      dt.ajax.reload();
                  }
              }
        ],
        columns: 
        [
            { // mengambil & menampilkan kolom sesuai tabel database
                data: 'no_tpn',
                name: 'no_tpn'
            },
            {
                data: 'no_btg',
                name: 'no_btg'
            },
            {
                data: 'nama_kayu',
                name: 'nama_kayu'
            },
            {
                data: 'vol',
                name: 'vol'
            },
            {
                data: 'nama_lokasi',
                name: 'nama_lokasi'
            },
        ],
    });
    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    //Initialize Select2 Elements
    $('.select2').select2();
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('yyyy', { 'placeholder': 'yyyy' })
    //Datemask dd/mm/yyyy
    $('#datemask2').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    //Money Euro
    $('[data-mask]').inputmask()

    $(document).on('click', '.delete-confirm', function() {
        let id = $(this).attr('data-id');
        let notpn = $(this).attr('data-kode');
        $('#id-destroy').val(id);
        $('#id-destroy2').html(notpn);
        $('#notpn_del').val(notpn);
    });

    $(document).on('click', '.del-conf-det-tpn', function() {
        let id = $(this).attr('data-id');
        let nobtg = $(this).attr('data-nobtg');
        let fromlok = $(this).attr('data-fromlok');
        let tolok = $(this).attr('data-tolok');
        $('#id-destroy').val(nobtg);
        $('#id-destroy2').html(nobtg);
        $('#from-lok').val(fromlok);
        $('#to-lok').val(tolok);
    });

    $(document).on('click', '.edit-form', function() {
        let id = $(this).attr('data-id');
        let thnrkt = $(this).attr('data-thnrkt');
        let nobtg = $(this).attr('data-kode');
        let tglukur = $(this).attr('data-tglukur');
        let ky = $(this).attr('data-ky');
        let kc = $(this).attr('data-kc');
        let kd = $(this).attr('data-kd');
        let kk = $(this).attr('data-kk');
        let hp = $(this).attr('data-hp');
        let dt_pjg = $(this).attr('data-pjg');
        let dt_pkl = $(this).attr('data-pkl');
        let dt_ujg = $(this).attr('data-ujg');
        let dt_rt2 = $(this).attr('data-rt2');
        let dt_cct = $(this).attr('data-cct');
        let dt_pcct = $(this).attr('data-pcct');
        let dt_vol = $(this).attr('data-vol');
        let dt_petak = $(this).attr('data-petak');
        let dt_kelas = $(this).attr('data-kelas');
        let dt_timbul = $(this).attr('data-timbul');
        $('#id-tpndetin').val(id);
        $('#thnrkt').val(thnrkt);
        $('#nobtg').val(nobtg);
        $('#tglukur').val(tglukur);
        $("#jns_kayu_m").val(ky).trigger('change');
        $("#kode_chainsaw_m").val(kc).trigger('change');
        $("#kode_driver_m").val(kd).trigger('change');
        $("#kode_kupas_m").val(kk).trigger('change');
        $("#kode_helper_m").val(hp).trigger('change');
        $('.dt_pjg').val(dt_pjg); //ini pakai class karena ID sudah terpakai
        $('.dt_pkl').val(dt_pkl);
        $('.dt_ujg').val(dt_ujg);
        $('.dt_rt2').val(dt_rt2);
        $('.dt_cct').val(dt_cct);
        $('.dt_pcct').val(dt_pcct);
        $('.dt_vol').val(dt_vol);
        $('.dt_petak').val(dt_petak);
        $('.dt_kelas').val(dt_kelas);
        $('#dt_timbul').val(dt_timbul).trigger('change');
    });

    $(document).on('click', '.edit-form-foruser', function() {
        let id = $(this).attr('data-id');
        let nobtg = $(this).attr('data-kode');
        let dt_pjg = $(this).attr('data-pjg');
        let dt_pkl = $(this).attr('data-pkl');
        let dt_ujg = $(this).attr('data-ujg');
        let dt_rt2 = $(this).attr('data-rt2');
        let dt_cct = $(this).attr('data-cct');
        let dt_pcct = $(this).attr('data-pcct');
        let dt_vol = $(this).attr('data-vol');
        let dt_petak = $(this).attr('data-petak');
        let dt_kelas = $(this).attr('data-kelas');
        $('#id-tpndetin').val(id);
        $('.nobtgx').val(nobtg);
        $('.dt_pjg').val(dt_pjg); //ini pakai class karena ID sudah terpakai
        $('.dt_pkl').val(dt_pkl);
        $('.dt_ujg').val(dt_ujg);
        $('.dt_rt2').val(dt_rt2);
        $('.dt_cct').val(dt_cct);
        $('.dt_pcct').val(dt_pcct);
        $('.dt_vol').val(dt_vol);
        $('.dt_petak').val(dt_petak);
        $('.dt_kelas').val(dt_kelas);
    });

    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
    }, 10000);

    $(function () {
      $("#pjg, #pkl, #ujg, #cct").keyup(function () {
        var j_k = $("#jns_kayu").val();
        var pjg = parseFloat($("#pjg").val() || 0);
        var pkl = parseInt($("#pkl").val() || 0);
        var ujg = parseInt($("#ujg").val() || 0);
        var cct = parseInt($("#cct").val() || 0);
        var rata = parseInt((pkl + ujg) / 2);
        var pcct = parseFloat((1.273 * cct * cct * 1 / rata / rata * 100) || 0);
        var pcct2 = parseFloat(1.273 * cct * cct * 1 / rata / rata * 100)/100;
        var pcct3 = pcct2.toFixed(3);
        var vol3 = parseFloat(((0.7854 * rata * rata * pjg) / 10000 - 0.7854 * rata * rata * pjg / 10000 * pcct3) || 0);
        var kls = "";
        if (rata<50){
          kls = "40-49";
        }else if(rata<60){
          kls = "50-59";
        }else{
          kls = "60 Up";
        }

        // var precision = Math.pow(100, 1);
        // var pvol3 = Math.ceil(vol3 * precision) / precision;
        
        $("#cct").val(cct);
        $("#rt2").val(rata);
        $("#pcct").val(Math.round(pcct));
        // $("#pcct").val(pcct.toFixed(1));
        // $("#vol").val(pvol3.toFixed(2));
        $("#vol").val(vol3.toFixed(2));
        $("#kelas").val(kls);
      });
    });

    $('#jns_kayu').on('change', function() {
      var data = $("#jns_kayu option:selected").val();
      var jnsTmbl = "";
      if(data === "0100"){
        jnsTmbl = "YA";
      }else{
        jnsTmbl = "TIDAK";
      }
      $("#timbul").val(jnsTmbl);
    })

    $('#jns_kayu_m').on('change', function() {
      var data = $("#jns_kayu_m option:selected").val();
      var jnsTmbl = "";
      if(data === "0100"){
        jnsTmbl = "YA";
      }else{
        jnsTmbl = "TIDAK";
      }
      $("#dt_timbul").val(jnsTmbl);
    })

    $("body").on('keyup', "#pjg-m , #pkl-m, #ujg-m, #cct-m", function() {
        var pjg = parseFloat($("#pjg-m").val() || 0);
        var pkl = parseInt($("#pkl-m").val() || 0);
        var ujg = parseInt($("#ujg-m").val() || 0);
        var cct = parseInt($("#cct-m").val() || 0);
        var rata = parseInt((pkl + ujg) / 2);
        var pcct = parseFloat(1.273 * cct * cct * 1 / rata / rata * 100);
        var pcct2 = parseFloat(1.273 * cct * cct * 1 / rata / rata * 100)/100;
        var pcct3 = pcct2.toFixed(3);
        var vol3 = (0.7854 * rata * rata * pjg) / 10000 - 0.7854 * rata * rata * pjg / 10000 * pcct3;
        var kls = "";
        if (rata<50){
          kls = "40-49";
        }else if(rata<60){
          kls = "50-59";
        }else{
          kls = "60 Up";
        }

        // var precision = Math.pow(100, 1);
        // var pvol3 = Math.ceil(vol3 * precision) / precision;

        
        $("#rt2-m").val(rata);
        $("#pcct-m").val(Math.round(pcct));
        // $("#pcct-m").val(pcct.toFixed(1));
        $("#vol-m").val(vol3.toFixed(2));
        // $("#vol-m").val(pvol3.toFixed(2));
        $("#kelas-m").val(kls);
    }); 

    $("body").on('keyup', "#pjg-mu , #pkl-mu, #ujg-mu, #cct-mu", function() {
        var pjg = parseFloat($("#pjg-mu").val() || 0);
        var pkl = parseInt($("#pkl-mu").val() || 0);
        var ujg = parseInt($("#ujg-mu").val() || 0);
        var cct = parseInt($("#cct-mu").val() || 0);
        var rata = parseInt((pkl + ujg) / 2);
        var pcct = parseFloat(1.273 * cct * cct * 1 / rata / rata * 100);
        var pcct2 = parseFloat(1.273 * cct * cct * 1 / rata / rata * 100)/100;
        var pcct3 = pcct2.toFixed(3);
        var vol3 = (0.7854 * rata * rata * pjg) / 10000 - 0.7854 * rata * rata * pjg / 10000 * pcct3;
        var kls = "";
        if (rata<50){
          kls = "40-49";
        }else if(rata<60){
          kls = "50-59";
        }else{
          kls = "60 Up";
        }

        // var precision = Math.pow(100, 1);
        // var pvol3 = Math.ceil(vol3 * precision) / precision;

        
        $("#rt2-mu").val(rata);
        $("#pcct-mu").val(Math.round(pcct));
        // $("#pcct-m").val(pcct.toFixed(1));
        $("#vol-mu").val(vol3.toFixed(2));
        // $("#vol-m").val(pvol3.toFixed(2));
        $("#kelas-mu").val(kls);
    });

    $(function () {
      $("#no_btg").keyup(function () {
        var nobtgx = $("#no_btg").val();        
        $("#nobtgx").val(nobtgx);
      });
    });

    //Date range picker
    $('#reservation').daterangepicker()

    // untuk autofocus kursor diakhir text pada textbox
    // $(document).ready(function() {  
    //   var input = $("#no_tpn");
    //   var len = input.val().length;
    //   input[0].focus();
    //   input[0].setSelectionRange(len, len);
    // });

    // document.getElementById('no_tpn').addEventListener('keyup', e => {
    //   const copyTextInput = document.getElementById('kd_tpn');
    //   copyTextInput.value = e.target.value;
    // });

  });
</script>
@yield('custom-js')
</body>
</html>
