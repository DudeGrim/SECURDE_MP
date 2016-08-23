@extends('master_layout/customer_master')

@section('customCSS')
  <!--  <link href="{{asset('css/shop-homepage.css')}}" rel="stylesheet"> -->
  <style>
  body{margin:40px;}
     .btn-circle {
       width: 29px;
       height: 29px;
       text-align: center;
       padding: 6px 0;
       font-size: 12px;
       line-height: 1.428571429;
       border-radius: 15px;
     }
     .btn-circle.btn-lg {
       width: 50px;
       height: 50px;
       padding: 13px 13px;
       font-size: 18px;
       line-height: 1.33;
       border-radius: 25px;
     }
  </style>
@endsection
@section('customScripts')
  <script>
    /*$(".alert").alert()*/
    $(document).ready(function () {
      /*
      $('.addToCart').click(function () {
              $('.parent').append("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Success! Item added successfully to cart.</div>")
      });*/
      $('.loginFirst').click(function() {
          location.href = "{{url('/login')}}";
      });

      $(".filter-button").click(function(){
          var value = $(this).attr('data-filter');
          if(value == "all"){
              $('.filter').show();
          }
          else{
              $(".filter").not('.'+value).hide();
              $('.filter').filter('.'+value).show();

          }
      });
      $("ul li").click(function() {
        $(this).parent().children().removeClass("active");
        $(this).addClass("active");
      });
});
  </script>
@endsection
@section('cartCount')
  <span class="badge cartCount"> {{ Cart::count() }}</span>
@endsection
@section('pagecontent')
<!-- Page Content -->
<div class="container">
  <div class="row">
      <div class="parent"></div>
      <div class="col-md-3">
          <p class="lead">Catalog</p>
          <ul class="list-group">
              <li class="list-group-item filter-button active" data-filter="all">All</li>
              <li class="list-group-item filter-button" data-filter="boots">Boots</li>
              <li class="list-group-item filter-button" data-filter="shoes">Shoes</li>
              <li class="list-group-item filter-button" data-filter="sandals">Sandals</li>
              <li class="list-group-item filter-button" data-filter="slippers">Slippers</li>
          </ul>
      </div>
      <div class="col-md-9">
          <div class="row">
            @foreach($products as $product)
              <div class="col-sm-4 col-lg-4 col-md-4 filter photo {{$product->category}}">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="pull-right">&#8369;{{$product->price}}</h4>
                          <h4><a href="#">{{$product->name}}</a></h4>
                      </div>
                      <div class="panel-body">
                        <p>Category: {{$product->category}}</p>
                    <form method="POST" action="{{ route('addToCart') }}">
                        <div class="form-group">
                          <h4>Select Size</h4></br>
                          <div data-toggle="buttons">
                        @foreach($product->stocks as $stock)
                          @if($stock->stock > 0)
                             <label class="btn btn-default btn-circle btn-size active">
                               <input type="radio" name="size" value="{{$stock->size}}" required>{{$stock->size}}
                             </label>
                          @endif
                        @endforeach
                          </div>
                        </div>
                      </div>
                      <div class="panel-footer">
                      @if(!empty(Auth::user()))
                         <input type="hidden" name="_token" value="{{csrf_token() }}">
                         <input type="hidden" name="idProduct" value="{{$product->idProduct}}">

                          <button id="{{$product->idProduct}}_addToCart" class="addToCart btn btn-primary btn-md btn-block" type="submit">
                          <span class="shoppingCartIcon glyphicon glyphicon-shopping-cart"></span>
                          Add to Cart

                          <!-- <script>console.log("USER IS LOGGED IN");</script> -->
                      @else
                        <button id="{{$product->idProduct}}_loginFirst" class="loginFirst btn btn-primary btn-md btn-block">
                        <span class="shoppingCartIcon glyphicon glyphicon-log-in"></span>
                        Login
                        </button>
                      @endif
                      </div>
                      </form>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </div>
</div>
<!-- /.container -->
@endsection
