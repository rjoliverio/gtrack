<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','GTrack')</title>
    <link href={{asset('css/app.css')}} rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href={{asset('css/stylish-portfolio.css')}} rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body id="page-top">
    <a class="menu-toggle rounded" href="#">
        <i class="fas fa-bars"></i>
      </a>
      <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
          <li class="sidebar-brand">
            <a class="js-scroll-trigger" href="/"><img src="{{asset('storage/images/gtrack-logo-2.png')}}" width="160" class="img-fluid "alt="" ></a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="/guest/announcements">Announcements</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="/guest/trackcollector">Track Collector</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="/guest/seminars">Seminars</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="/guest/contactus">Contact Us</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="/guest/about">About</a>
          </li>
        </ul>
      </nav>
      @yield('content')

      <footer class="footer text-center">
        <div class="container">
          <ul class="list-inline mb-5">
            <li class="list-inline-item">
              <a class="social-link rounded-circle text-white mr-3" href="#!">
                <i class="icon-social-facebook"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="social-link rounded-circle text-white mr-3" href="#!">
                <i class="icon-social-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="social-link rounded-circle text-white" href="#!">
                <i class="icon-social-github"></i>
              </a>
            </li>
          </ul>
          <p class="text-muted small mb-0">Copyright &copy; Your Website 2020</p>
        </div>
      </footer>

      <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>
      <script src={{asset('js/app.js')}}></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
      <script src={{asset('js/stylish-portfolio.min.js')}}></script>
      @include('sweetalert::alert')
</body>
</html>