<?php $__env->startSection('customScripts'); ?>
<script>
$(document).ready(function () {
  (function ($) {
      $('#filter').keyup(function () {
          var rex = new RegExp($(this).val(), 'i');
          $('.searchable tr').hide();
          $('.searchable tr').filter(function () {
              return rex.test($(this).text());
          }).show();
      })
  }(jQuery));
});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecontent'); ?>
<div class="container">
        <div class="row">
            <div class="panel panel-default">
              <div class="panel-heading">Sales</div>
              <div class="panel-body">
              <div class="input-group"> <span class="input-group-addon">Filter</span>
                  <input id="filter" type="text" class="form-control" placeholder="Category / Product Name">
              </div>
              <div class="table-responsive">
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="col-md-2">Date</th>
                          <th class="col-md-2">Customer Name<th>
                          <th class="col-md-1">Category<th>
                          <th class="col-md-3">Product Name<th>
                          <th class="col-md-1">Quantity</th>
                          <th class="col-md-1">Price</th>
                          <th class="col-md-2">Total Sales</th>
                        </tr>
                      </thead>
                      <tbody class="searchable">
                        <?php if(empty($transactions)): ?>
                        <tr>
                          <td colspan="10">No Transactions to Display!</td>
                        </tr>
                        <?php endif; ?>
                        <?php foreach($transactions as $transaction): ?>
                          <tr>
                            <td colspan="1"><?php echo e(date('F d, Y', strtotime($transaction->created_at))); ?></td>
                            <td colspan="1"><?php echo e($transaction->idCustomer); ?></td>
                            <td colspan="2"><?php echo e($transaction->productSold->category); ?></td>
                            <td colspan="3"><?php echo e($transaction->productSold->name); ?></td>
                            <td colspan="1"><?php echo e($transaction->quantity); ?></td>
                            <td colspan="1"><?php echo e($transaction->price); ?></td>
                            <td colspan="1"><?php echo e($transaction->price * $transaction->quantity); ?></td>
                          </tr>
                        <?php endforeach; ?>

                      </tbody>
                </table>
              </div>
            </div>
          </div>
          <div>
      </div>
<!-- /.container -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master_layout/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>