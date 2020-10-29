<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title','GTrack'); ?></title>
    <link href=<?php echo e(asset('css/app.css')); ?> rel="stylesheet">
    <link href=<?php echo e(asset('css/contact-us.css')); ?> rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href=<?php echo e(asset('css/stylish-portfolio.css')); ?> rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css' rel='stylesheet' />
    <?php echo $__env->yieldContent('css'); ?>

  </head>
<body id="page-top">
    <a class="menu-toggle rounded" href="#">
        <i class="fas fa-bars"></i>
      </a>
      <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
          <li class="sidebar-brand">
            <a class="js-scroll-trigger text-decoration-none img-logo" href="/"><img src="<?php echo e(asset('storage/images/gtrack-logo-2.png')); ?>" width="160" class="img-fluid "alt="" ></a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="/announcements">Announcements</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="/calendar">Schedules</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="/trackcollector">Track Collector</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="/seminars">Events</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="/contact-us">Contact Us</a>
          </li><hr>
          <li class="sidebar-nav-item">
            <a class="btn btn-success text-white btn-sm rounded login" href="/login">Login</a>
          </li>
          
        </ul>
      </nav>
      
      <?php echo $__env->yieldContent('content'); ?>

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
      <script src=<?php echo e(asset('js/app.js')); ?>></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script src=<?php echo e(asset('js/stylish-portfolio.min.js')); ?>></script>
      <script src=<?php echo e(asset('js/gallery.js')); ?>></script>
      <?php echo $__env->yieldContent('scripts'); ?>
      <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\Users\rjoli\Desktop\gtrack\gtrack\resources\views/layouts/guest_master.blade.php ENDPATH**/ ?>