<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','GTrack')</title>
    <link href={{asset('css/app.css')}} rel="stylesheet">
    <link href={{asset('css/contact-us.css')}} rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href={{asset('css/announcement-seminar.css')}} rel="stylesheet">
    <link href={{asset('css/stylish-portfolio.css')}} rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href={{asset('css/map-css.css')}} rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css' rel='stylesheet' />
    
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
            <a class="js-scroll-trigger" href="/announcements">Announcements</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="/trackcollector">Track Collector</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="/seminars">Seminars</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="/contact-us">Contact Us</a>
          </li>
        </ul>
      </nav>
      
      @yield('content')

      <footer class="footer text-center">
        <div class="container">
          <ul class="list-inline mb-4">
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
          <p class="text-muted small mb-0">Copyright &copy; GTrack 2020</p>
        </div>
      </footer>

      <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>
      <script src={{asset('js/app.js')}}></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script src={{asset('js/stylish-portfolio.min.js')}}></script>
      <script src={{asset('js/gallery.js')}}></script>
      @yield('scripts')
      @include('sweetalert::alert')
</body>
</html>