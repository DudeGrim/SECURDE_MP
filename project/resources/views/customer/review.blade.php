@extends('master_layout/customer_master')

@section('customCSS')
  <!--  <link href="{{asset('css/shop-homepage.css')}}" rel="stylesheet"> -->
  <style>
  body{margin:40px;}
     .btn-circle {
       width: 30px;
       height: 30px;
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

@section('pagecontent')
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-xs-3">
    <div class="panel panel-default">
      <div class="panel-heading">Product Information</div>
        <div class="panel-body">
          <h4>Category: {{$product->category}}</h4>
          <h4>Name: {{$product->name}}</h4>
          <h4>Price: {{$product->price}}</h4>
          <h4>Description: </h4>
          <h5>{{$product->description}}</h5>
          <h4>Stocks:</h4>
            @foreach($product->stocks as $stock)
                <h4>{{$stock->size}}:{{$stock->stock}}</h4>
            @endforeach

        </div>
      </div>
      </div>
      <div class="col-md-9">
        <div class="panel panel-default">
          <div class="panel-heading">Write a Review </div>
            <div class="panel-body">
            <form method="POST" action="{{ route('reviewNew') }}">
                <input type="hidden" name="_author" value="1">
                <input type="hidden" name="_idProduct" value="{{$product->idProduct}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group row">
                  <h4 for="example-text-input" class="col-xs-12 col-form-label">Review:</h4>
                  <div class="col-xs-12">
                    <textarea name="_review" id="review" class="form-control" rows="5" rows="5" maxlength="65000" placeholder="Write your review here" required></textarea>
                    <span id="reviewchars"></span>
                  </div>
                </div>
                <div class="footer">
                    <div class="col-xs-6">
                        <div class="form-group row">
                        <h4 class="col-xs-2">Rating: </h4>
                        <div class="col-xs-10" data-toggle="buttons">
                          @for ($i = 1; $i <= 5; $i++)
                          <label class="btn btn-default btn-circle btn-size active">
                            <input type="radio" name="_rating" value="{{$i}}">{{$i}}
                          </label>
                          @endfor
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-6 pull-right">
                      <button class="btn btn-block btn-success" type="submit">Post Review</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
      </div>
      <div class="col-md-9">
      <div class="panel panel-default">
          <div class="panel-heading">Product Reviews</div>
          <div class="panel-body">

            @foreach($product->reviews as $review)
            <div class="panel panel-info">
                <div class="panel-heading row">
                  <div class="col-md-6">{{$review->writer->accountDetails->username}}</div>
                  <div class="col-md-6 text-right">{{ date('F d, Y', strtotime($review->created_at)) }}</div>
                </div>
                <div class="panel-body">
                @for ($i = 0; $i < $review->rating; $i++)
                  <span class="glyphicon glyphicon-star" style="color:red"></span>
                @endfor
                @for ($i = 0; $i < (5 - $review->rating); $i++)
                  <span class="glyphicon glyphicon-star-empty" style="color:red"></span>
                @endfor
                <p>{{$review->review}}</p>
              </div>
            </div>
            @endforeach
          </div>
      </div>
    </div>
    </div>
</div>
<!-- /.container -->

@endsection

@section('customScripts')
<script>
    $(document).ready(function() {
      var text_max = 140;
      $('#chars').html((text_max - $('#productname').val().length)  + ' characters remaining');

      $('#description').keyup(function() {
          var text_length = $('#description').val().length;
          var text_remaining = text_max - text_length;

          $('#chars').html(text_remaining + ' characters remaining');
      });

      var name_text_max = 45;

      $('#namechars').html((name_text_max - $('#productname').val().length) + ' characters remaining');

      $('#productname').keyup(function() {
          var text_length = $('#productname').val().length;
          var text_remaining = name_text_max - text_length;

          $('#namechars').html(text_remaining + ' characters remaining');
      });
  });
</script>
@endsection
