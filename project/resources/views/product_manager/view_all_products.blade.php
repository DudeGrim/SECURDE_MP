@extends('product_manager/product_manager_layout')

@section('customCSS')
    <link href="css/pm.css" rel="stylesheet">
@endsection

@section('pagecontent')
<!-- Page Content -->
<div class="container">
        <div class="well">
          <form method="POST" action="{{ route('addNewProduct') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-1 col-form-label">Category: </h4>
              <div class="col-xs-2">
                 <select name="_category" class="form-control" id="category">
                   <option value='Boots'>Boots</option>
                   <option value='Shoes'>Shoes</option>
                   <option value='Sandals'>Sandals</option>
                   <option value='Slippers'>Slippers</option>
                 </select>
               </div>
               <h4 for="example-text-input" class="col-xs-1 col-form-label">Name: </h4>
               <div class="col-xs-5">
                 <input name="_name" class="form-control" type="text" placeholder="Name of Product" id="example-text-input">
               </div>
               <div class="form-group row">
                 <h4 for="example-text-input" class="col-xs-1 col-form-label">Price:</h4>
                 <div class="col-xs-2">
                   <input name="_price" class="form-control" type="text" placeholder="&#8369;XXX.XX" id="example-text-input">
                 </div>
               </div>
              </div>

            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-12 col-form-label">Description:</h4>
              <div class="col-xs-12">
                <textarea name="_description" id="description" class="form-control" placeholder="Enter short product description"
                  rows="5" id="example-text-input"></textarea>
                  <h6 class="pull-right" id="count_message"></h6>
              </div>
            </div>

            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-12 col-form-label">Stocks:</h4>
                @foreach(range(5,11) as $size)
                    <p for="example-text-input" class="col-xs-2 col-form-label">Size {{$size}}: </p>
                    <div class="col-xs-2">
                      <input name="size_{{$size}}"class="form-control" type="text" placeholder="Size {{$size}}" id="example-text-input">
                    </div>
                @endforeach
            </div>
            <div class="buyNow">
              <button class="btn btn-block btn-success" type="submit"><span class="shoppingCartIcon glyphicon glyphicon-edit"></span>Add New Product</button>
            </div>
        </form>
        </div>
        <h1>Products</h1>
          <div class="table-responsive">
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

                  @if (empty($products))
                  <tr>
                    <td colspan="8">No Products to Display!</td>
                  </tr>
                  @endif
                    @foreach ($products as $product)
                    <tr>
                      <td name="idProduct">{{ $product->idProduct}}</td>
                      <td name="category">{{ $product->category}}</td>
                      <td name="name">{{ $product->name}}</td>
                      <td name="description">{{ $product->description}}</td>
                      <!--<td name="size">{{ $product->size}}</td>
                      <td name="stock">{{ $product->stock}}</td>-->
                      <td name="price">{{ $product->price}}</td>
                      <td>
                          <div class="btn-group">
                               <a href="products/{{$product->idProduct}}" class="btn btn-info btn-lg" role="button"><span class="glyphicon glyphicon-edit"></span></a>
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


  <!-- /.container -->
@endsection

@section('customScripts')

@endsection
