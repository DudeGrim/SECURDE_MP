<?php $__env->startSection('pagecontent'); ?>
<!-- Page Content -->
<div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Add New Product</div>
          <div class="panel-body">
          <form method="POST" action="<?php echo e(route('addNewProduct')); ?>">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-1 col-form-label">Category: </h4>
              <div class="col-xs-2">
                 <select name="_category" class="form-control" id="category" required>
                   <option value='' disabled selected="selected">select</option>
                   <option value='boots'>Boots</option>
                   <option value='shoes'>Shoes</option>
                   <option value='sandals'>Sandals</option>
                   <option value='slippers'>Slippers</option>
                 </select>
               </div>
               <h4 for="example-text-input" class="col-xs-1 col-form-label">Name: </h4>
               <div class="col-xs-5">
                 <input name="_name" id="productname" class="form-control" type="text" placeholder="Name of Product" maxlength="45" required>
                 <span id="namechars">45</span>
               </div>
               <div class="form-group row">
                 <h4 for="example-text-input" class="col-xs-1 col-form-label">Price: </h4>
                 <div class="col-xs-2">
                   <input name="_price" class="form-control" type="number" min="0" step="0.01" placeholder="Enter price"  required>
                 </div>
               </div>
              </div>

            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-12 col-form-label">Description:</h4>
              <div class="col-xs-12">
                <textarea name="_description" id="description" class="form-control" placeholder="Enter short product description"
                  rows="5" maxlength="140" required></textarea>
                <span id="chars">140</span>
              </div>
            </div>

            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-12 col-form-label">Stocks:</h4>
                <?php foreach(range(5,11) as $size): ?>
                    <p for="example-text-input" class="col-xs-2 col-form-label">Size <?php echo e($size); ?>: </p>
                    <div class="col-xs-2">
                      <input name="size_<?php echo e($size); ?>" class="form-control" type="number"
                      min="0" step ="1" value="0" required>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="buyNow">
              <button class="btn btn-block btn-success" type="submit"><span class="shoppingCartIcon glyphicon glyphicon-edit"></span>Add New Product</button>
            </div>
        </form>
      </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Products</div>
          <div class="panel-body table-responsive">
              <table id="productTable" class="table table-hover">
                  <thead>
                    <tr>
                      <th class="col-md-1">ID</th>
                      <th class="col-md-1">Category</th>
                      <th class="col-md-3">Name</th>
                      <th class="col-md-4">Description</th>
                      <th class="col-md-1">Size</th>
                      <th class="col-md-2">Options</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php if(empty($products)): ?>
                  <tr>
                    <td colspan="8">No Products to Display!</td>
                  </tr>
                  <?php endif; ?>
                    <?php foreach($products as $product): ?>
                    <tr>
                      <td name="idProduct"><?php echo e($product->idProduct); ?></td>
                      <td name="category"><?php echo e($product->category); ?></td>
                      <td name="name"><?php echo e($product->name); ?></td>
                      <td name="description"><?php echo e($product->description); ?></td>
                      <td name="price"><?php echo e($product->price); ?></td>
                      <td>
                          <div class="col-md-12 btn-group">
                               <a href="products/<?php echo e($product->idProduct); ?>" class="col-md-6 btn btn-info btn-md" role="button">Edit</a>
                               <form method="POST" action="products/<?php echo e($product->idProduct); ?>/delete" onsubmit="return confirm('Are you sure, You want to delete this product?');" onsubmit="myFunction()">
                                 <?php echo e(method_field('DELETE')); ?>

                                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                  <input type="submit" class="col-md-6  btn btn-md btn-danger" value="Delete"></input>
                               </form>
                          </div>
                      </td>

                    </tr>
                    <?php endforeach; ?>
                  </tbody>
            </table>
          </div>
      </div>


  <!-- /.container -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>
<!-- <script src="<?php echo e(asset('js/jquery.js')); ?>"></script> -->
<script>
    $(document).ready(function() {
      var text_max = 140;
      $('#chars').html(text_max + ' characters remaining');

      $('#description').keyup(function() {
          var text_length = $('#description').val().length;
          var text_remaining = text_max - text_length;

          $('#chars').html(text_remaining + ' characters remaining');
      });

      var name_text_max = 45;
      $('#namechars').html(text_max + ' characters remaining');

      $('#productname').keyup(function() {
          var text_length = $('#productname').val().length;
          var text_remaining = name_text_max - text_length;

          $('#namechars').html(text_remaining + ' characters remaining');
      });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master_layout/product_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>