@extends('master_layout/customer_master')

@section('customCSS')
    <link href="{{ asset('css/review.css') }}" rel="stylesheet">
@endsection

@section('pagecontent')
<!-- Page Content -->
<div class="container">
          <div class="col-md-12">
              <div class="thumbnail">
                <!--<img class="img-responsive" src="http://placehold.it/800x300" alt="">-->
                  <div class="caption-full">
                      <h4 class="pull-right">&#8369;@yield('price')</h4>
                      <h4><a href="#">@yield('name')</a>
                      </h4>
                      <p>@yield('description')</p>
                  </div>
                  <div class="ratings">
                      <p class="pull-right">@yield('reviewCount') reviews</p>
                      <p>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star-empty"></span>
                          @yield('reviewAverage')
                      </p>
                  </div>
                  <div class="buyNow">
                      <a href="#" class="btn btn-primary btn-md btn-block">
                         <span class="shoppingCartIcon glyphicon glyphicon-shopping-cart"></span>
                         Add to Cart
                      </a>
                  </div>
              </div>

              <div class="well">
                  <div class="row">
                      <div class="col-md-12">
                        @yield('ratingStar')
                        <!--
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star-empty"></span>
                        -->
                          <strong class="name">@yield('username', 'Anonymous')</strong>
                          <span class="pull-right">@yield('reviewdate', 'August 6, 2016')</span>
                          <p>@yield('review', 'This product was great in terms of quality. I would definitely buy another!')</p>
                      </div>
                  </div>

                  <hr>

              </div>

          </div>

      </div>
  </div>
<!-- /.container -->

@endsection

@section('customScripts')

@endsection
