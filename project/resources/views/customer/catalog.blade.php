@extends('master_layout/customer_master')

@section('customCSS')
  <!--  <link href="{{asset('css/shop-homepage.css')}}" rel="stylesheet"> -->
@endsection

@section('pagecontent')
<!-- Page Content -->
<div class="container">
  <div class="row">
      <div class="col-md-3">
          <p class="lead">Catalog</p>
          <div class="list-group">
              <a href="#" class="list-group-item">Boots</a>
              <a href="#" class="list-group-item">Shoes</a>
              <a href="#" class="list-group-item">Sandals</a>
              <a href="#" class="list-group-item">Slippers</a>
          </div>
      </div>

      <div class="col-md-9">
          <div class="row">
            @foreach($products as $product)
              <div class="col-sm-4 col-lg-4 col-md-4">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="pull-right">&#8369;{{$product->price}}</h4>
                          <h4><a href="#">{{$product->name}}</a></h4>
                      </div>
                      <div class="panel-body">
                        <p>Category: {{$product->category}}</p>
                        <p>Size:Stock</p>
                        @foreach($product->stocks as $stock)
                          <p class="col-md-3">{{$stock->size}}:{{$stock->stock}}</p>
                        @endforeach
                        <!--
                        @foreach($product->stocks as $stock)
                          @if($stock->stock > 0)
                            <input type="radio" name="{{$product->idProduct}}_size">{{$stock->size}}</input>
                          @endif
                        @endforeach
                      -->
                      </div>
                      <div class="panel-footer">
                          <a href="#" class="btn btn-primary btn-md btn-block">
                             <span class="shoppingCartIcon glyphicon glyphicon-shopping-cart"></span>
                             Add to Cart
                          </a>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </div>
</div>
<!-- /.container -->

@endsection
