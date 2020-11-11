<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title','GTrack')</title>

  <!-- Custom fonts for this template-->
  <link href={{asset('css/app.css')}} rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href={{asset('css/sb-admin-2.css')}} rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/easy-autocomplete.css" integrity="sha512-PZ83szWxZ41zcHUPd7NSgLfQ3Plzd7YmN0CHwYMmbR7puc6V/ac5Mm0t8QcXLD7sV/0AuKXectoLvjkQUdIz9g==" crossorigin="anonymous" />
  <link href={{asset('css/search-suggestion.css')}} rel="stylesheet">
  @yield('css')
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
        <img src="{{asset('storage/images/gtrack-logo-3.png')}}" width="150" class="img-fluid "alt="" >
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ (request()->is('driver/schedule')) ? 'active' : '' }}">
        <a class="nav-link" href="/driver/schedule">
          <i class="fas fa-fw fas fa-calendar-alt"></i>
          <span>Schedule</span></a>
      </li>
      <li class="nav-item {{ (request()->is('driver/weight')) ? 'active' : '' }}">
        <a class="nav-link" href="/driver/weight">
          <i class="fas fa-fw fas fa-weight"></i>
          <span>Input Collected Weight</span></a>
          </li>
      <li class="nav-item {{ (request()->is('driver/tracker')) ? 'active' : '' }}">
        <a class="nav-link" href="/driver/tracker">
          <i class="fas fa-fw  fas fa-map-marker-alt"></i>
          <span>Location</span></a>
      </li>
      <li class="nav-item {{ (request()->is('driver/reports')) ? 'active' : '' }}">
        <a class="nav-link" href="/driver/reports">
          <i class="fas fa-fw fas fa-exclamation-circle"></i>
          <span>Report</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="form-wrapper d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group div-wrapper">
              
                <input type="text" class="form-control bg-light border-0 small template-links" placeholder="Search for..." >
              
            </div>
          </form>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                  <div class="input-group">
                    <form class="form-wrapper">
                      <input type="text" class="form-control bg-light border-0 small template-links2" placeholder="Search for..." >
                    </form>
                  </div>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->userdetail->fname}} {{Auth::user()->userdetail->lname}}</span>
                <img class="img-profile rounded-circle" src={{asset('storage/images/uploads/'.Auth::user()->userdetail->image)}}>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/driver/profile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                  
                <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; GTrack 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src={{asset('js/app.js')}}></script>
  <!-- Core plugin JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <!-- Custom scripts for all pages-->
  <script src={{asset('js/sb-admin-2.js')}}></script>

  <!-- Page level plugins -->
  


  <!-- Page level custom scripts -->
  {{-- <script src={{asset('js/chart-area-demo.js')}}></script>
  
  <!-- ---------------------------------------------------- -->
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-database.js"></script>
<script src={{asset('js/firebase-notification.js')}}></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/jquery.easy-autocomplete.min.js" integrity="sha512-Z/2pIbAzFuLlc7WIt/xifag7As7GuTqoBbLsVTgut69QynAIOclmweT6o7pkxVoGGfLcmPJKn/lnxyMNKBAKgg==" crossorigin="anonymous"></script>
<script src={{asset('js/search-suggestion-driver.js')}}></script>
    @yield('scripts')
    @include('sweetalert::alert')
</body>

</html>
