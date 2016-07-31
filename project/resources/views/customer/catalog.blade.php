@extends('master_layout/customer_master')

@section('customCSS')
    <link href="css/shop-homepage.css" rel="stylesheet">
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

          <div class="row carousel-holder">

              <div class="col-md-12">
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner">
                          <div class="item active">
                              <img class="slide-image" src="http://placehold.it/800x300" alt="">
                          </div>
                          <div class="item">
                              <img class="slide-image" src="http://placehold.it/800x300" alt="">
                          </div>
                          <div class="item">
                              <img class="slide-image" src="http://placehold.it/800x300" alt="">
                          </div>
                      </div>
                      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                      </a>
                      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                      </a>
                  </div>
              </div>

          </div>

          <div class="row">

              <div class="col-sm-4 col-lg-4 col-md-4">
                  <div class="thumbnail">
                      <img src="http://placehold.it/320x150" alt="">
                      <div class="caption">
                          <h4 class="pull-right">&#8369;24.99</h4>
                          <h4><a href="#">First Product</a>
                          </h4>
                          <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                      </div>

                      <div class="ratings">
                          <p class="pull-left">
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star-empty"></span>
                          </p>
                          <p class="pull-right">15 reviews</p>
                      </div>
                      <div class="buyNow">
                          <a href="#" class="btn btn-primary btn-md btn-block">
                             <span class="shoppingCartIcon glyphicon glyphicon-shopping-cart"></span>
                             Add to Cart
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- /.container -->

@endsection

@section('customScripts')

@endsection
