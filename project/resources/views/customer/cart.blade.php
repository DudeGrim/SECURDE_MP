@extends('customer/customerLayout')

@section('customCSS')
    <link href="css/cart.css" rel="stylesheet">
@endsection

@section('pagecontent')
<!-- Page Content -->
<div class="container">
        <h2>Your shopping cart</h2>
        <hr>
          <div class="table-responsive">
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="col-md-1">Remove</th>
                      <th class="col-md-4">Item</th>
                      <th class="col-md-3">Quantity</th>
                      <th class="col-md-2">Price</th>
                      <th class="col-md-2">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center"><input type="checkbox" value="" name=""></td>
                      <td>Cool Boots for Kids</td>
                      <td><input type="text" value="1" name="quantity"></td>
                      <td>4000</td>
                      <td>8000</td>
                    </tr>
                    <tr>
                      <td class="text-center"><input type="checkbox" value="" name=""></td>
                      <td>Sandals for the Spartan</td>
                      <td><input type="text" value="1" name="quantity"></td>
                      <td>1000</td>
                      <td>1000</td>
                    </tr>
                    <tr>
                      <td class="text-center"><input type="checkbox" value="" name=""></td>
                      <td>Dollshoes for that ballerina</td>
                      <td><input type="text" value="1" name="quantity"></td>
                      <td>1500</td>
                      <td>4500</td>
                    </tr>
                     <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="total">Total: </td>
                      <td class="total">&#8369;13500</td>
                    </tr>
                  </tbody>
            </table>
          </div>
          <input type="submit" class="btn btn-success btn-lg pull-right" value="Proceed to Checkout">
      </div>
<!-- /.container -->

@endsection

@section('customScripts')
<script src="js/jquery.bootstrap-touchspin.js"></script>
<script type="text/javascript">
        $("input[name='quantity']").TouchSpin({
            min: 1,
            max: 10,
            step: 1,
        });
</script>
@endsection
