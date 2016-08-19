<?php $__env->startSection('customCSS'); ?>
  <style>
    .total{
      font-size: 20px;
    }
  </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navbarContents'); ?>
  <li class="nav-item">
      <a class="nav-link" href="#">Catalog
      </a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="#">Shopping Cart
      </a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="#">Transaction
      </a>
  </li>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master_layout/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>