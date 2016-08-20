<?php $__env->startSection('customCSS'); ?>
    <link href="<?php echo e(asset('css/pm.css')); ?>" rel="stylesheet">

    <script src="<?php echo e(asset('js/jquery.js')); ?>"
    <script src="<?php echo e(asset('js/jquery.bootstrap-touchspin.js')); ?>"></script>

        <script>
        /*
            $("input[name='stock']").TouchSpin({
                min: 0,
                step: 1,
            });
*/
            var text_max = 140;
            $('#count_message').html(text_max + ' remaining');

            $('#description').keyup(function() {
              var text_length = $('#text').val().length;
              var text_remaining = text_max - text_length;

              $('#count_message').html(text_remaining + ' remaining');
            });
            var name_text_max = 45;
            $('#name_count_message').html(name_text_max + ' remaining');

            $('#name').keyup(function() {
              var text_length = $('#name').val().length;
              var text_remaining = name_text_max - text_length;

              $('#name_count_message').html(text_remaining + ' remaining');
            });
        </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecontent'); ?>
<!-- Page Content -->
<div class="container">
  <!--
        <div class="col-md-12">

            <h4>Product ID: <?php echo e($product->idProduct); ?></h4>
            <div>
              <h4 class="col-md-4">Category: <?php echo e($product->category); ?></h4>
              <h4 class="col-md-4">Product Name: <?php echo e($product->name); ?> </h4>
              <h4 class="col-md-4">Price: &#8369;<?php echo e($product->price); ?></h4>
            </div>
            <h4>Description: <?php echo e($product->description); ?></h4>

              <table>
                <thead>
                  <th>Size</th>
                  <th>Stock</th>
                </thead>
                <tbody>
                  <?php foreach($product->stocks as $stock): ?>
                  <tr>
                    <td><?php echo e($stock->size); ?></td>
                    <td><?php echo e($stock->stock); ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
        </div>
      -->
      <h2>Edit Product Information</h2>
        </form>
        <div class="well">
          <form method="POST" action="<?php echo e($product->idProduct); ?>/update">
            <?php echo e(method_field('PATCH')); ?>

            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-1 col-form-label">Category: </h4>
              <div class="col-xs-2">
                 <select name="_category" class="form-control" id="category">
                   <?php if( $product->category == 'boots'): ?>
                     <option value='boots' selected="selected">Boots</option>
                     <option value='shoes'>Shoes</option>
                     <option value='sandals'>Sandals</option>
                     <option value='slippers'>Slippers</option>
                   <?php elseif($product->category == 'shoes'): ?>
                     <option value='boots'>Boots</option>
                     <option value='shoes' selected="selected">Shoes</option>
                     <option value='sandals'>Sandals</option>
                     <option value='slippers'>Slippers</option>
                   <?php elseif($product->category == 'sandals'): ?>
                     <option value='boots'>Boots</option>
                     <option value='shoes'>Shoes</option>
                     <option value='sandals' selected="selected">Sandals</option>
                     <option value='slippers'>Slippers</option>
                   <?php elseif($product->category == 'slippers'): ?>
                     <option value='boots'>Boots</option>
                     <option value='shoes'>Shoes</option>
                     <option value='sandals'>Sandals</option>
                     <option value='slippers' selected="selected">Slippers</option>
                   <?php endif; ?>
                 </select>
               </div>
               <h4 for="example-text-input" class="col-xs-1 col-form-label">Name: </h4>
               <div class="col-xs-5">
                 <input name="_name" class="form-control" type="text" value="<?php echo e($product->name); ?>" id="productname" maxlength="45" required>
                 <span id="namechars"></span>
               </div>
               <div class="form-group row">
                 <h4 for="example-text-input" class="col-xs-1 col-form-label">Price:</h4>
                 <div class="col-xs-2">
                   <input name="_price" class="form-control" type="number" min="0" step="0.01" value="<?php echo e($product->price); ?>"  required>
                 </div>
               </div>
              </div>

            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-12 col-form-label">Description:</h4>
              <div class="col-xs-12">
                <textarea name="_description" id="description" class="form-control" rows="5" rows="5" maxlength="140" required><?php echo e($product->description); ?></textarea>
                <span id="chars"></span>
              </div>
            </div>
            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-12 col-form-label">Stocks:</h4>
                <?php foreach($product->stocks as $stock): ?>
                    <p for="example-text-input" class="col-xs-2 col-form-label">Size <?php echo e($stock->size); ?>: </p>
                    <div class="col-xs-2">
                      <input name="size_<?php echo e($stock->size); ?>"class="form-control" type="number"
                      min="0" step ="1" value="<?php echo e($stock->stock); ?>" required>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="buyNow">
                <button class="btn btn-block btn-success" type="submit"><span class="shoppingCartIcon glyphicon glyphicon-edit"></span>Update Product Information</button>
            </div>
        </form>
        </div>
</div>
<!-- /.container -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>
<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script>
    $(document).ready(function() {
      var text_max = 140;
      $('#chars').html((text_max - $('#productname').val().length)  + ' characters remaining');

      $('#description').keyup(function() {
          var text_length = $('#description').val().length;
          var text_remaining = text_max - text_length;

          $('#chars').html(text_remaining + ' characters remaining');
      });

      var name_text_max = 45;

      $('#namechars').html((name_text_max - $('#productname').val().length) + ' characters remaining');

      $('#productname').keyup(function() {
          var text_length = $('#productname').val().length;
          var text_remaining = name_text_max - text_length;

          $('#namechars').html(text_remaining + ' characters remaining');
      });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('product_manager/product_manager_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>