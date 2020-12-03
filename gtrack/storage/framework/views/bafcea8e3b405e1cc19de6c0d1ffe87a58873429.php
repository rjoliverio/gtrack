
<?php $__env->startSection('css'); ?>
<link href=<?php echo e(asset('css/announcement-seminar.css')); ?> rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <!-- Jumbotron Header -->
 <header class="jumbotron mb-4 headsem" style="background: linear-gradient(rgba(52, 220, 147, 0.7), rgba(52, 220, 147, 0.1)),url('<?php echo e(asset('storage/images/nature4.jpg')); ?>') fixed center center; background-size: cover;">
    <h1 class="display-3">CONTACT US</h1>
  </header>
  <div class="container">
<div class="row rowcont ">
    <div class="col-lg-6 ">
      <div class="card w-100 contacts" id="contacts2">
        
                <div class="info">
                <h3 class="label h31"><i class="icon-location-pin"></i>&nbsp;Location:</h3>
                <p>Compostela Cebu</p>
                      
                
                <h3 class="label"><i class="icon-envelope"></i>&nbsp;Email:</h3>
                <p>gtrack32@gmail.com</p>
                
                
                <h3 class="label"><i class="icon-phone"></i>&nbsp;Call:</h3>
                <p>+1 5589 55488 555</p>
                <div class="row maprow">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d481.5082771455725!2d124.0124866104508!3d10.454073514242154!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a9bb73bdc2f1ab%3A0x5a777942d545699b!2sCompostela%20Municipal%20Hall!5e1!3m2!1sen!2sph!4v1606189116533!5m2!1sen!2sph" width="600" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                </div>
                                  
      </div>
    </div>
<div class="col-lg-6 ">
  <div class="card w-100 contacts" id="contacts3">
      <h3 class="label">Send Us A Message</h3>
      <?php if(count($errors)>0): ?>
      <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
      <?php endif; ?>

      <?php if($message = Session::get('success')): ?>
      <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong><?php echo e($message); ?></strong>
      </div>
      <?php endif; ?>
      <form method="post" action="<?php echo e(url('/send')); ?>">
          <?php echo e(csrf_field()); ?>

          <div class="container w-100">
              <h4 class="title"></h4>

              <?php if(isset(Auth::user()->email)): ?>
              <input type="text" name="email" class="form-control form-control-lg w-100 ml-auto mr-auto mb-1"
                  id="email" placeholder="Email Address" readonly>
              <?php else: ?>
              <input type="text" name="email" class="form-control form-control-lg w-100 ml-auto mr-auto mb-1"
                  id="email" placeholder="Email Address">
              <?php endif; ?>
              <input type="text" name="subject" class="form-control form-control-lg w-100 ml-auto mr-auto mb-1"
                  id="subject" placeholder="Subject">
              <textarea name="message" class="form-control form-control-lg w-100 ml-auto mr-auto mb-3" name="" id=""
                  cols="30" rows="10" placeholder="Type your message here...">
                                  </textarea>

          </div>
          <div class="sendcont mr-3 mt-1 mb-1 ">
              <input type="submit" name="send" class="form-control form-control-md " id="sendbtn" value="Send">
          </div>
      </form>
  </div>
</div>
</div> 
</div>                  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rjoli\Desktop\gtrack\gtrack\resources\views/guest/contact.blade.php ENDPATH**/ ?>