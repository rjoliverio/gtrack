
<?php $__env->startSection('title'); ?>
    GTrack | Announcements
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href=<?php echo e(asset('css/announcement-seminar.css')); ?> rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="jumbotron text-center" id="anno" style="background: linear-gradient(rgba(52, 220, 147, 0.7), rgba(52, 220, 147, 0.1)),url('<?php echo e(asset('storage/images/nature2.jpg')); ?>') fixed center center; background-size: cover;">
        <div class="container head">
          <h1 class="site-heading">ANNOUNCEMENTS</h1>
          
        </div>
</div>

      <div class="album py-5 bg-light">
        <div class="container">
        <?php $__currentLoopData = $ann; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="post-preview speech-bubble">
          <a href="post.html">
            <h2 class="post-title">
              
<?php echo e($row->title); ?>

            </h2>
            <h3 class="post-subtitle">
           <?php echo e($row->content); ?>

            </h3>
          </a>
          <h6><i>Attached Images:</i></h6>
      <div class="text-center mb-3 border border-secondary rounded-lg p-3 ul">
      <a class="thumbnail fancybox text-center text-decoration-none li" rel="ligthbox"
            href="/storage/images/uploads/<?php echo e($row->image->image_1); ?>">
            <img class="img-fluid ann-images " alt="" src="/storage/images/uploads/<?php echo e($row->image->image_1); ?>" width="100"/>
        </a>
        <a class="thumbnail fancybox text-center text-decoration-none li" rel="ligthbox"
            href="/storage/images/uploads/<?php echo e($row->image->image_2); ?>">
            <img class="img-fluid ann-images " alt="" src="/storage/images/uploads/<?php echo e($row->image->image_2); ?>" width="100"/>
        </a>
        <a class="thumbnail fancybox text-center text-decoration-none li" rel="ligthbox"
            href="/storage/images/uploads/<?php echo e($row->image->image_3); ?>">
            <img class="img-responsive img-fluid ann-images" alt=""
                src="/storage/images/uploads/<?php echo e($row->image->image_3); ?>" width="100"/>
        </a>
        <a class="thumbnail fancybox text-center text-decoration-none li" rel="ligthbox"
            href="/storage/images/uploads/<?php echo e($row->image->image_4); ?>">
            <img class="img-responsive img-fluid ann-images" alt=""
                src="/storage/images/uploads/<?php echo e($row->image->image_4); ?>" width="100"/>
        </a>
   </div>
          <p class="post-meta">Posted by
            <a href="#"><?php echo e($row->user->userdetail->fname); ?> <?php echo e($row->user->userdetail->lname); ?></a>
            on <?php echo e($row->created_at); ?></p>
        </div>
            </div>
            </div>
            <hr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            </div>
            <div class="d-flex justify-content-center">
            <?php echo e($ann->links()); ?>

        </div>
           </div>
           
</div>


    
<section class="jumbotron text-center" id="anno1" style="background: linear-gradient(rgba(52, 220, 147, 0.7), rgba(52, 220, 147, 0.1)),url('<?php echo e(asset('storage/images/nature2.jpg')); ?>') fixed center center; background-size: cover;">
        
</section>
  <!-- <div class="container" id="posts">
    <div class="row genann">
      <div class="col-sm-8">
        <div class="row anno">
        <img src="<?php echo e(asset('storage/images/rj.jpg')); ?>" width="160" height="10" class="img-fluid profimg"alt="" >
        <div class="post-preview speech-bubble">
          <a href="post.html">
            <h2 class="post-title">
              Man must explore, and this is exploration at its greatest
            </h2>
            <h3 class="post-subtitle">
              Problems look mighty small from 150 miles up
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 24, 2019</p>
        </div>
        </div>
        <hr>
        <div class="row">
        <img src="<?php echo e(asset('storage/images/gtrack-logo-2.png')); ?>" width="160" class="img-fluid profimg"alt="" >
        <div class="post-preview speech-bubble">
          <a href="post.html">
            <h2 class="post-title">
              Man must explore, and this is exploration at its greatest
            </h2>
            <h3 class="post-subtitle">
              Problems look mighty small from 150 miles up
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 24, 2019</p>
        </div>
        </div>
        <hr>
        <div class="row">
        <img src="<?php echo e(asset('storage/images/gtrack-logo-2.png')); ?>" width="160" class="img-fluid profimg"alt="" >
        <div class="post-preview speech-bubble">
          <a href="post.html">
            <h2 class="post-title">
              Man must explore, and this is exploration at its greatest
            </h2>
            <h3 class="post-subtitle">
              Problems look mighty small from 150 miles up
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 24, 2019</p>
        </div>
        </div>
        <hr>
        <div class="row">
        <img src="<?php echo e(asset('storage/images/gtrack-logo-2.png')); ?>" width="160" class="img-fluid profimg"alt="" >
        <div class="post-preview speech-bubble">
          <a href="post.html">
            <h2 class="post-title">
              Man must explore, and this is exploration at its greatest
            </h2>
            <h3 class="post-subtitle">
              Problems look mighty small from 150 miles up
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 24, 2019</p>
        </div>
        </div>
        <hr>
    </div>
</div> -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rjoli\Desktop\gtrack\gtrack\resources\views/guest/announcements.blade.php ENDPATH**/ ?>