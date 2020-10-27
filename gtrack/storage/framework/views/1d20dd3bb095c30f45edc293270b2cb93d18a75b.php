

<?php $__env->startSection('title'); ?>
    GTrack | Reports
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href=<?php echo e(asset('css/reports-css.css')); ?> rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="card shadow-lg">
            <div class="card-header bg-danger text-white">
              Recent Reports
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <?php if($reports->contains('status', 0)): ?>
                    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($report->status==0): ?>
                    <li class="list-group-item">
                        <a class="text-decoration-none text-dark" href="/admin/reports/show/<?php echo e($report->report_id); ?>">
                            <div class="row report-pending-wrapper">
                                <div class="col-lg-1 col-md-1 col-sm-1 d-flex align-items-center text-center">
                                    <img src=<?php echo e(asset('storage/images/uploads/'.$report->userdetail->image)); ?> class="img-fluid img-responsive report-user-images shadow-sm" data-holder-rendered="true"  alt="user-pic">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <span class="report-user-name font-weight-bold"><?php echo e($report->userdetail->fname); ?> <?php echo e($report->userdetail->lname); ?></span>
                                    <span class="float-right d-inline-block report-user-date"><?php echo e(\Carbon\Carbon::parse($report->created_at)->format('g:i A')); ?> <?php echo e(\Carbon\Carbon::parse($report->created_at)->format('d F Y')); ?></span>
                                    <span class="small font-weight-bold d-block"><?php echo e($report->subject); ?> | <?php echo e($report->degree); ?></span>
                                    <span class="small d-inline-block text-truncate" style="max-width: 90%;"><?php echo e($report->message); ?></span>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 d-flex align-items-center mark-as-btn">
                                    <form id="logout-form" action="/admin/reports/resolve/<?php echo e($report->report_id); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                    <button class="btn btn-block small btn-success"><i class="fas fa-thumbs-up"></i></button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($reports->links()); ?>

                    <?php else: ?>
                        <li class="list-group-item text-center">No reports from drivers</li>
                    <?php endif; ?>
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
                    <?php if($reports->contains('status', 1)): ?>
                    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">
                        <a class="text-decoration-none text-dark" href="/admin/reports/show/<?php echo e($report->report_id); ?>">
                            <div class="row report-pending-wrapper">
                                <div class="col-lg-1 col-md-1 col-sm-1 d-flex align-items-center text-center">
                                    <img src=<?php echo e(asset('storage/images/uploads/'.$report->userdetail->image)); ?> class="img-fluid img-responsive report-user-images shadow-sm" data-holder-rendered="true"  alt="user-pic">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <span class="report-user-name font-weight-bold"><?php echo e($report->userdetail->fname); ?> <?php echo e($report->userdetail->lname); ?></span>
                                    <span class="float-right d-inline-block report-user-date"><?php echo e(\Carbon\Carbon::parse($report->created_at)->format('g:i A')); ?> <?php echo e(\Carbon\Carbon::parse($report->created_at)->format('d F Y')); ?></span>
                                    <span class="small font-weight-bold d-block"><?php echo e($report->subject); ?> | <?php echo e($report->degree); ?></span>
                                    <span class="small d-inline-block text-truncate" style="max-width: 90%;"><?php echo e($report->message); ?></span>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 d-flex align-items-center mark-as-btn">
                                    <form id="logout-form" action="/admin/reports/remove/<?php echo e($report->report_id); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                    <button class="btn btn-block small btn-secondary"><i class="fas fa-minus-circle"></i></i></button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($reports->links()); ?>

                    <?php else: ?>
                        <li class="list-group-item text-center">No resolved reports yet.</li>
                    <?php endif; ?>
                </ul>
            </div>
          </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rjoli\Desktop\gtrack\gtrack\resources\views/admin/reports/reports.blade.php ENDPATH**/ ?>