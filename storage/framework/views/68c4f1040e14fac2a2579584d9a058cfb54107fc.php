<?php $__env->startSection('customCSS'); ?>
    <link href="<?php echo e(asset('css/review.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecontent'); ?>
<!-- Page Content -->
<div class="container">
          <div class="col-md-12">
              <div class="thumbnail">
                <!--<img class="img-responsive" src="http://placehold.it/800x300" alt="">-->
                  <div class="caption-full">
                      <h4 class="pull-right">&#8369;<?php echo $__env->yieldContent('price'); ?></h4>
                      <h4><a href="#"><?php echo $__env->yieldContent('name'); ?></a>
                      </h4>
                      <p><?php echo $__env->yieldContent('description'); ?></p>
                  </div>
                  <div class="ratings">
                      <p class="pull-right"><?php echo $__env->yieldContent('reviewCount'); ?> reviews</p>
                      <p>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star-empty"></span>
                          <?php echo $__env->yieldContent('reviewAverage'); ?>
                      </p>
                  </div>
                  <?php echo $__env->yieldContent('actionButton'); ?>
              </div>

              <div class="well">
                  <div class="row">
                      <div class="col-md-12">
                        <?php echo $__env->yieldContent('ratingStar'); ?>
                        <!--
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star-empty"></span>
                        -->
                          <strong class="name"><?php echo $__env->yieldContent('username', 'Anonymous'); ?></strong>
                          <span class="pull-right"><?php echo $__env->yieldContent('reviewdate', 'August 6, 2016'); ?></span>
                          <p><?php echo $__env->yieldContent('review', 'This product was great in terms of quality. I would definitely buy another!'); ?></p>
                      </div>
                  </div>

                  <hr>

              </div>

          </div>

      </div>
  </div>
<!-- /.container -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master_layout/customer_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>