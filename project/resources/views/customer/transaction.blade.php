@extends('customer/customerLayout')

@section('customCSS')
    <link href="css/transaction.css" rel="stylesheet">
@endsection

@section('pagecontent')
<!-- Page Content -->
<div class="container">
        <h1>July 26, 2016</h1>
          <div class="table-responsive">
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="col-md-6">Item</th>
                      <th class="col-md-2">Price</th>
                      <th class="col-md-2">Quantity</th>
                      <th class="col-md-2">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Cool Boots for Kids</td>
                      <td>4000</td>
                      <td>2</td>
                      <td>8000</td>
                    </tr>
                    <tr>
                      <td>Sandals for the Spartan</td>
                      <td>1000</td>
                      <td>1</td>
                      <td>1000</td>
                    </tr>
                    <tr>
                      <td>Dollshoes for that ballerina</td>
                      <td>1500</td>
                      <td>3</td>
                      <td>4500</td>
                    </tr>
                     <tr>
                      <td></td>
                      <td class="total">Total: </td>
                      <td>6</td>
                      <td class="total">&#8369;13500</td>
                    </tr>
                  </tbody>
            </table>
          </div>
          <hr/>
           <h1>July 22, 2016</h1>
          <div class="table-responsive">
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th class="col-md-6">Item</th>
                      <th class="col-md-2">Price</th>
                      <th class="col-md-2">Quantity</th>
                      <th class="col-md-2">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Cool Sapatos</td>
                      <td>2000</td>
                      <td>1</td>
                      <td>2000</td>
                    </tr>
                     <tr>
                      <td></td>
                      <td class="total">Total: </td>
                      <td>1</td>
                      <td class="total">&#8369;2000</td>
                    </tr>
                  </tbody>
            </table>
          </div>
      </div>
<!-- /.container -->

@endsection

@section('customScripts')

@endsection
