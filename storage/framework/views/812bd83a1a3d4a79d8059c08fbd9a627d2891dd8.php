<?php $__env->startSection('pagecontent'); ?>
<!-- Page Content -->
<div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">Your shopping cart</div>
          <div class="panel-body table-responsive">
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="col-md-2">Remove</th>
                      <th class="col-md-4">Item</th>
                      <th class="col-md-2">Quantity</th>
                      <th class="col-md-2">Price</th>
                      <th class="col-md-2">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <form method="POST" action="#" onsubmit="return confirm('Are you sure, You want to delete this product?');" onsubmit="myFunction()">
                          <?php echo e(method_field('DELETE')); ?>

                           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                           <input type="submit" class="btn btn-md btn-danger" value="Delete"></input>
                        </form>
                      </td>
                      <td>Cool Boots for Kids</td>
                      <td><input type="number" min="1" step="1" value="1" id="quantity" required></td>
                      <td>4000</td>
                      <td>8000</td>
                    </tr>
                     <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="total">Total: </td>
                      <td class="total">&#8369;<span id="totalAmount">8000</span></td>
                    </tr>
                  </tbody>
            </table>

            <input type="submit" class="btn btn-success btn-lg pull-right" value="Proceed to Checkout">
          </div>
      </div>
    </div>
<!-- /.container -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master_layout/customer_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>