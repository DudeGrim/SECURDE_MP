@extends('master_layout/product_master')

@section('pagecontent')
<!-- Page Content -->
<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">Edit Product Information</div>
        <div class="panel-body">
          <form method="POST" action="{{$product->idProduct}}/update">
            {{ method_field('PATCH') }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-1 col-form-label">Category: </h4>
              <div class="col-xs-2">
                 <select name="_category" class="form-control" id="category">
                   @if ( $product->category == 'boots')
                     <option value='boots' selected="selected">Boots</option>
                     <option value='shoes'>Shoes</option>
                     <option value='sandals'>Sandals</option>
                     <option value='slippers'>Slippers</option>
                   @elseif ($product->category == 'shoes')
                     <option value='boots'>Boots</option>
                     <option value='shoes' selected="selected">Shoes</option>
                     <option value='sandals'>Sandals</option>
                     <option value='slippers'>Slippers</option>
                   @elseif ($product->category == 'sandals')
                     <option value='boots'>Boots</option>
                     <option value='shoes'>Shoes</option>
                     <option value='sandals' selected="selected">Sandals</option>
                     <option value='slippers'>Slippers</option>
                   @elseif ($product->category == 'slippers')
                     <option value='boots'>Boots</option>
                     <option value='shoes'>Shoes</option>
                     <option value='sandals'>Sandals</option>
                     <option value='slippers' selected="selected">Slippers</option>
                   @endif
                 </select>
               </div>
               <h4 for="example-text-input" class="col-xs-1 col-form-label">Name: </h4>
               <div class="col-xs-5">
                 <input name="_name" class="form-control" type="text" value="{{ $product->name }}" id="productname" maxlength="45" required>
                 <span id="namechars"></span>
               </div>
               <div class="form-group row">
                 <h4 for="example-text-input" class="col-xs-1 col-form-label">Price:</h4>
                 <div class="col-xs-2">
                   <input name="_price" class="form-control" type="number" min="0" step="0.01" value="{{ $product->price }}"  required>
                 </div>
               </div>
              </div>

            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-12 col-form-label">Description:</h4>
              <div class="col-xs-12">
                <textarea name="_description" id="description" class="form-control" rows="5" rows="5" maxlength="140" required>{{ $product->description }}</textarea>
                <span id="chars"></span>
              </div>
            </div>
            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-12 col-form-label">Stocks:</h4>
                @foreach($product->stocks as $stock)
                    <p for="example-text-input" class="col-xs-2 col-form-label">Size {{$stock->size}}: </p>
                    <div class="col-xs-2">
                      <input name="size_{{$stock->size}}"class="form-control" type="number"
                      min="0" step ="1" value="{{$stock->stock}}" required>
                    </div>
                @endforeach
            </div>
            <div class="buyNow">
                <button class="btn btn-block btn-success" type="submit"><span class="shoppingCartIcon glyphicon glyphicon-edit"></span>Update Product Information</button>
            </div>
        </form>
        </div>
      </div>
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
