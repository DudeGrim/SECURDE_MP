<?php $__env->startSection('navbarContents'); ?>
<li>
    <a href="<?php echo e(route('viewAllProducts')); ?>">Products</a>
</li>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master_layout/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>