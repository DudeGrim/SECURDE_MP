@extends('master_layout/customer_master')

@section('pagecontent')
<!-- Page Content -->
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">July 26, 2016</div>
          <div class="panel-body table-responsive">
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="col-md-4">Item</th>
                      <th class="col-md-1">Size</th>
                      <th class="col-md-1">Quantity</th>
                      <th class="col-md-2">Price</th>
                      <th class="col-md-2">Subtotal</th>
                      <th class="col-md-2">Review Product</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Cool Boots for Kids</td>
                      <td>5</td>
                      <td>2</td>
                      <td>4000</td>
                      <td>8000</td>
                      <td>
                        <button type="button" class="btn btn-md btn-success"
                        data-toggle="collapse" data-target="#reviewForm">
                         Review
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td class="total">Total: </td>
                      <td>6</td>
                      <td class="total">&#8369;13500</td>
                    </tr>
                  </tbody>
            </table>
      </div>
    </div>
<!-- /.container -->
@endsection

@section('customScripts')

@endsection
