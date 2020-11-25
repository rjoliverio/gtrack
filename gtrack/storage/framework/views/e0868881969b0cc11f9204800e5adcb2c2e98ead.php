


<?php $__env->startSection('title'); ?>
    GTrack | Events
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href=<?php echo e(asset('css/announcement-seminar.css')); ?> rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Jumbotron Header -->
    <header class="jumbotron mb-4 headsem" style="background: linear-gradient(rgba(52, 220, 147, 0.7), rgba(52, 220, 147, 0.1)),url('<?php echo e(asset('storage/images/img/nature4.jpg')); ?>') fixed center center; background-size: cover;">
      <h1 class="display-3">EVENTS</h1>
</header>
<div class="container">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="/storage/images/img/event1.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Welcome to Events</h1>
                <p><i>Here you can see all the events regarding waste management in Barangay Poblacion, Compostela</i></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="/storage/images/img/event2.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1><i>Help Nature...</i></h1>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="/storage/images/img/event3.png" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1><i>Become Responsible...</i></h1>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
<!-- Carousel -->
<div class="row">
  <h5>Upcoming Events</h5>
</div>
<hr>
<div class="row">
<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="/storage/images/uploads/<?php echo e($row->image->image_1); ?>" alt="">
          <div class="card-body">
            <h4 class="card-title"><?php echo e($row->event_name); ?></h4>
            <p class="card-text"><?php echo e(\Illuminate\Support\Str::limit($row->description,100)); ?></p>
          </div>
          <div class="card-footer">
            <a href="#showCont<?php echo e($row->event_id); ?>" class="btn btn-primary" data-toggle="modal">Find Out More!</a>
          </div>
        </div>
      </div>
      <div id="showCont<?php echo e($row->event_id); ?>" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                      
                                        <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                
      <img src="/storage/images/uploads/<?php echo e($row->image->image_1); ?>" class="images-display" width="450" alt="Responsive image">
      <div class="text-center mb-3 border border-secondary rounded-lg p-3 ">
        <a class="thumbnail fancybox text-center text-decoration-none" rel="ligthbox"
            href="/storage/images/uploads/<?php echo e($row->image->image_2); ?>">
            <img class="img-fluid bike-images " alt="" src="/storage/images/uploads/<?php echo e($row->image->image_2); ?>" width="50"/>
        </a>
        <a class="thumbnail fancybox text-center text-decoration-none" rel="ligthbox"
            href="/storage/images/uploads/<?php echo e($row->image->image_3); ?>">
            <img class="img-responsive img-fluid bike-images" alt=""
                src="/storage/images/uploads/<?php echo e($row->image->image_3); ?>" width="50"/>
        </a>
        <a class="thumbnail fancybox text-center text-decoration-none" rel="ligthbox"
            href="/storage/images/uploads/<?php echo e($row->image->image_4); ?>">
            <img class="img-responsive img-fluid bike-images" alt=""
                src="/storage/images/uploads/<?php echo e($row->image->image_4); ?>" width="50"/>
        </a>
    </div>
      <hr>
      <div>
      <div>
                                                    <h2 class="modal-title"><i><?php echo e($row->event_name); ?></i></h2>
                                                    
                                                </div>
                                              <div>
                                              <div class="text-center mb-3 border border-secondary rounded-lg p-3 ">
                                              <p><?php echo e($row->description); ?></p>
                                              </div>
                                              <div class="text-left mb-3 border border-secondary rounded-lg p-3 ">
                                              <div class="row">
                                              <h4><b>Other Details:</b></h4>
                                              </div>
                                              <p><i>Start Date:</i> <?php echo e($row->start_date); ?></p>
                                              <p><i>End Date:</i> <?php echo e($row->end_date); ?></p>
                                              
        <p><i>Who:</i> <?php echo e($row->participants); ?></p>
        <p><i>Contact Person:</i> <?php echo e($row->userdetail->fname); ?> <?php echo e($row->userdetail->lname); ?>, <?php echo e($row->userdetail->contact_no); ?></p>
                                              </div>
        
        </div>
      </div>

  
                                                </div>

                  
                                        </div>
                                    </div>
                                </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="row">
  <h5>All Events</h5>
</div>
<hr>
    <!-- Page Features -->
    <div class="row">
    <?php $__currentLoopData = $arr2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="/storage/images/uploads/<?php echo e($row->image->image_1); ?>" alt="">
          <div class="card-body">
            <h4 class="card-title"><?php echo e($row->event_name); ?></h4>
            <p class="card-text"><?php echo e(\Illuminate\Support\Str::limit($row->description,100)); ?></p>
          </div>
          <div class="card-footer">
            <a href="#showCont<?php echo e($row->event_id); ?>" class="btn btn-primary" data-toggle="modal">Find Out More!</a>
          </div>
        </div>
      </div>
      <div id="showCont<?php echo e($row->event_id); ?>" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                      
                                        <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                
      <img src="/storage/images/uploads/<?php echo e($row->image->image_1); ?>" class="images-display" width="450" alt="Responsive image">
      <div class="text-center mb-3 border border-secondary rounded-lg p-3 ">
        <a class="thumbnail fancybox text-center text-decoration-none" rel="ligthbox"
            href="/storage/images/uploads/<?php echo e($row->image->image_2); ?>">
            <img class="img-fluid bike-images " alt="" src="/storage/images/uploads/<?php echo e($row->image->image_2); ?>" width="50"/>
        </a>
        <a class="thumbnail fancybox text-center text-decoration-none" rel="ligthbox"
            href="/storage/images/uploads/<?php echo e($row->image->image_3); ?>">
            <img class="img-responsive img-fluid bike-images" alt=""
                src="/storage/images/uploads/<?php echo e($row->image->image_3); ?>" width="50"/>
        </a>
        <a class="thumbnail fancybox text-center text-decoration-none" rel="ligthbox"
            href="/storage/images/uploads/<?php echo e($row->image->image_4); ?>">
            <img class="img-responsive img-fluid bike-images" alt=""
                src="/storage/images/uploads/<?php echo e($row->image->image_4); ?>" width="50"/>
        </a>
    </div>
      <hr>
      <div>
      <div>
                                                    <h2 class="modal-title"><i><?php echo e($row->event_name); ?></i></h2>
                                                    
                                                </div>
                                              <div>
                                              <div class="text-center mb-3 border border-secondary rounded-lg p-3 ">
                                              <p><?php echo e($row->description); ?></p>
                                              </div>
                                              <div class="text-left mb-3 border border-secondary rounded-lg p-3 ">
                                              <div class="row">
                                              <h4><b>Other Details:</b></h4>
                                              </div>
                                              <p><i>Start Date:</i> <?php echo e($row->start_date); ?></p>
                                              <p><i>End Date:</i> <?php echo e($row->end_date); ?></p>
        <p><i>Who:</i> <?php echo e($row->participants); ?></p>
        <p><i>Contact Person:</i> <?php echo e($row->userdetail->fname); ?> <?php echo e($row->userdetail->lname); ?>, <?php echo e($row->userdetail->contact_no); ?></p>
                                              </div>
        
        </div>
      </div>

  
                                                </div>

                  
                                        </div>
                                    </div>
                                </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    </div>
    
    <!-- /.row -->
    <div class="d-flex justify-content-center">
            <?php echo e($arr2->links()); ?>

        </div>
  </div>
  
  
  <!-- /.container -->
  <section class="jumbotron text-center mt-5" id="anno1" style="background: linear-gradient(rgba(52, 220, 147, 0.7), rgba(52, 220, 147, 0.1)),url('<?php echo e(asset('storage/images/img/nature4.jpg')); ?>') fixed center center; background-size: cover;">
        
</section>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rjoli\Desktop\gtrack\gtrack\resources\views/guest/seminars.blade.php ENDPATH**/ ?>