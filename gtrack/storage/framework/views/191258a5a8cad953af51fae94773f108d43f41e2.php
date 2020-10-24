

<?php $__env->startSection('title'); ?>
    GTrack | Reports
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href=<?php echo e(asset('css/reports-css.css')); ?> rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="card shadow-lg">
            <div class="card-header bg-warning text-dark">
              Recent Reports
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a class="text-decoration-none text-dark" href="/admin/report/view">
                            <div class="row report-pending-wrapper">
                                <div class="col-lg-1 col-md-1 col-sm-1 d-flex align-items-center text-center">
                                    <img src=<?php echo e(asset('storage/images/img/anis.jpg')); ?> class="img-fluid img-responsive report-user-images shadow-sm" data-holder-rendered="true"  alt="user-pic">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <span class="report-user-name font-weight-bold">RJ Oliverio</span>
                                    <span class="float-right d-inline-block report-user-date">7:00 PM October 16, 2020</span>
                                    <span class="small font-weight-bold d-block">Subject | Degree</span>
                                    <span class="small d-inline-block text-truncate" style="max-width: 90%;">asdjasj kdjasdjasdask dnaksdnJADSKFBASNDB CNAMadsfvsdfvsdfbsdfb
                                        adfbvsfbsfgbdfgbf gbdfgbdfgbS DVAS DVJAS DVKsn dvasdf asfgsdfgsd fgsdfgsdf gsdf gsdf gsdfg</span>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 d-flex align-items-center mark-as-btn">
                                    <button class="btn btn-block small btn-success"><i class="fas fa-thumbs-up"></i></button>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-header bg-success text-white">
              Resolved Reports
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a class="text-decoration-none text-dark" href>
                            <div class="row report-pending-wrapper">
                                <div class="col-lg-1 col-md-1 col-sm-1 d-flex align-items-center text-center">
                                    <img src=<?php echo e(asset('storage/images/img/anis.jpg')); ?> class="img-fluid img-responsive report-user-images shadow-sm" data-holder-rendered="true"  alt="user-pic">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <span class="report-user-name font-weight-bold">RJ Oliverio</span>
                                    <span class="float-right d-inline-block report-user-date">7:00 PM October 16, 2020</span>
                                    <span class="small font-weight-bold d-block">Subject | Degree</span>
                                    <span class="small d-inline-block text-truncate" style="max-width: 90%;">asdjasj kdjasdjasdask dnaksdnJADSKFBASNDB CNAMadsfvsdfvsdfbsdfb
                                        adfbvsfbsfgbdfgbf gbdfgbdfgbS DVAS DVJAS DVKsn dvasdf asfgsdfgsd fgsdfgsdf gsdf gsdf gsdfg</span>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 d-flex align-items-center mark-as-btn">
                                    <button class="btn btn-block small btn-danger"><i class="fas fa-minus-circle"></i></i></button>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
          </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rjoli\Desktop\gtrack\gtrack\resources\views/admin/reports.blade.php ENDPATH**/ ?>