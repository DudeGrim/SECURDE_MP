@extends('product_manager/product_manager_layout')

@section('customCSS')
    <link href="css/pm.css" rel="stylesheet">
@endsection

@section('pagecontent')
<!-- Page Content -->
<div class="container">
        <h1>Products</h1>
          <div class="table-responsive">
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="col-md-1">ID</th>
                      <th class="col-md-1">Category</th>
                      <th class="col-md-2">Name</th>
                      <th class="col-md-3">Description</th>
                      <th class="col-md-1">Size</th>
                      <th class="col-md-1">Stock</th>
                      <th class="col-md-1">Price</th>
                      <th class="col-md-2">Options</th>
                    </tr>
                  </thead>
                  <tbody>


                  <!--TODO: Add checking for products -->  
                  <tr>
                    <td colspan="8">No Products to Display!</td>
                  </tr>

                    @foreach ($products as $product)
                    <tr>
                      <td>{{ $product->idProduct}}</td>
                      <td>{{ $product->category}}</td>
                      <td>{{ $product->name}}</td>
                      <td>{{ $product->description}}</td>
                      <td>{{ $product->size}}</td>
                      <td>{{ $product->stock}}</td>
                      <td>{{ $product->price}}</td>
                      <td>
                          <div class="btn-group">
                              <button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#editModal">
                                 <span class="glyphicon glyphicon-edit"></span>
                              </button>
                              <button type="button" class="btn btn-lg btn-danger">
                                  <span class="glyphicon glyphicon-trash"></span>
                              </button>
                          </div>
                      </td>
                    </tr>
                    @endforeach


                  </tbody>
            </table>
          </div>
      </div>

      <!-- Modal -->
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Product Information</h4>
            <h3>Product ID: 1</h3>
          </div>
          <div class="modal-body">
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
                <div class="col-md-10">
                  <input type="text" class="form-control" id="name" placeholder="old Name">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" for="name">Description:</label>
                <div class="col-md-10">
                  <textarea class="form-control" rows="3" id="description"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" for="name">Description:</label>
                <div class="col-md-10">
                  <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
              </div>
          </form>
          </div>
        </div>

      </div>
    </div>

  <!-- /.container -->
<!-- /.container -->

@endsection

@section('customScripts')

@endsection
