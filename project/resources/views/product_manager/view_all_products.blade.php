@extends('product_manager/product_manager_layout')

@section('customCSS')
    <link href="css/pm.css" rel="stylesheet">
@endsection

@section('pagecontent')
<!-- Page Content -->
<div class="container">
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
                            
                               <a href="public_path()/products/{{$product->idProduct}}" class="btn btn-info" role="button"><span class="glyphicon glyphicon-edit"></span></a>
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
