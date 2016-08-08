@extends('product_manager/product_manager_layout')

@section('customCSS')
    <link href="{{ asset('css/pm.css') }}" rel="stylesheet">

@endsection

@section('pagecontent')

<!-- Page Content -->

<div class="container">
          <h1>Product Information</h1>

          <h3>Product ID: {{ $product->idProduct}} </h3>

          <div class="row">
            <div class="col-md-6">
              <form class="form-horizontal" role="form">
                <div class="form-group">
                  <label class="control-label col-md-2" for="category">Category:</label>
                  <div class="col-md-10">
                      <select class="form-control" id="categorySelect">
                      <option>Boots</option>
                      <option>Sandals</option>
                      <option>Shoes</option>
                      <option>Slippers</option>
                    </select>
                  </div>
                </div>
                
              </form>
            </div>
          </div>
          <!--
               <form class="form-horizontal" role="form">
                <div class="form-group">
                  <label class="control-label col-md-2" for="category">Category:</label>
                  <div class="col-md-10">
                      <select class="form-control" id="categorySelect">
                      <option>Boots</option>
                      <option>Sandals</option>
                      <option>Shoes</option>
                      <option>Slippers</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2" for="name">Name:</label>
                    <div class="col-md-10 well">
                        <input type="text" class="form-control" id="name" placeholder="old Name" maxlength="45">
                        <h6 class="pull-right" id="name_count_message"></h6>
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2" for="name">Description:</label>
                    <div class="col-md-10 well">
                        <textarea class="form-control" id="description" name="text" placeholder="Type in your message" rows="3" maxlength="140"></textarea>
                        <h6 class="pull-right" id="count_message"></h6>
                    </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2" for="size">Size:</label>
                  <div class="col-md-2">
                    <input type="text" class="form-control" id="name" placeholder="old Size" disabled>
                  </div>
                  <label class="control-label col-md-2" for="size">Active   :</label>
                  <div class="col-md-2">
                    <input type="text" class="form-control" id="name" placeholder="old Size" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2" for="size">Stock:</label>
                  <div class="col-md-2">
                    <input type="text" class="form-control" name="stock" placeholder="old Stock">
                  </div>
                  <label class="control-label col-md-2" for="size">Price:</label>
                  <div class="col-md-2">
                      <input id="price" class="form-control" type="text" placeholder="old Price" name="price">
                  </div>
                </div>
                <button type="button" class="pull-right btn btn-primary btn-lg" data-toggle="modal" data-target="#confirmUpdateModal">Confirm</button>

            </form>
          -->
        </div>


<!-- Modal -->
<!--
        <div class="container">

      <div class="modal fade" id="confirmUpdateModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Confirm Update</h4>
            </div>
            <div class="modal-body">
              <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th class="col-md-2">Field</th>
                        <th class="col-md-5">Original</th>
                        <th class="col-md-5">Updated</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Category</td>
                        <td>Original Category</td>
                        <td>Edited Category</td>
                      </tr>
                      <tr>
                        <td>Name</td>
                        <td>Original Name</td>
                        <td>Edited Name</td>
                      </tr>
                      <tr>
                        <td>Description</td>
                        <td>Original Description</td>
                        <td>Edited Description</td>
                      </tr>
                      <tr>
                        <td>Stock</td>
                        <td>Original Stock</td>
                        <td>Edited Stock</td>
                      </tr>
                      <tr>
                        <td>Price</td>
                        <td>Original Price</td>
                        <td>Edited Price</td>
                      </tr>
                    </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-lg btn-success" data-dismiss="modal">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  -->
<!-- /.container -->

@endsection

@section('customScripts')
<script src="js/jquery.bootstrap-touchspin.js"></script>

    <script>
        $("input[name='stock']").TouchSpin({
            min: 0,
            step: 1,
        });

        var text_max = 140;
        $('#count_message').html(text_max + ' remaining');

        $('#description').keyup(function() {
          var text_length = $('#description').val().length;
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
@endsection
