@extends('master_layout/productMaster')

@section('customCSS')
    <link href="{{asset('css/pm.css') }}" rel="stylesheet">

    <script src="{{asset('js/jquery.js')}}"
    <script src="{{asset('js/jquery.bootstrap-touchspin.js') }}"></script>

        <script>
        /*
            $("input[name='stock']").TouchSpin({
                min: 0,
                step: 1,
            });
*/
            var text_max = 140;
            $('#count_message').html(text_max + ' remaining');

            $('#description').keyup(function() {
              var text_length = $('#text').val().length;
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

@section('pagecontent')
<!-- Page Content -->
<div class="container">
        <div class="col-md-12">
            <h4>Product ID: {{$product->idProduct}}</h4>
            <div>
              <h4 class="col-md-4">Category: {{$product->category}}</h4>
              <h4 class="col-md-4">Product Name: {{$product->name}} </h4>
              <h4 class="col-md-4">Price: &#8369;{{$product->price}}</h4>
            </div>
            <h4>Description: {{$product->description}}</h4>

              <table>
                <thead>
                  <th>Size</th>
                  <th>Stock</th>
                </thead>
                <tbody>
                  @foreach($product->stocks as $stock)
                  <tr>
                    <td>{{$stock->size}}</td>
                    <td>{{$stock->stock}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        <div class=" well col-md-12">
          <form method="POST">
            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-2 col-form-label">Category: </h4>
              <div class="col-xs-10">
                 <select class="form-control" id="category">
                   <option value='Boots'>Boots</option>
                   <option value='Shoes'>Shoes</option>
                   <option value='Sandals'>Sandals</option>
                   <option value='Slippers'>Slippers</option>
                 </select>
               </div>
              </div>
            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-2 col-form-label">Name: </h4>
              <div class="col-xs-10">
                <input class="form-control" type="text" placeholder="{{$product->name}}" id="example-text-input">
              </div>
            </div>
            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-2 col-form-label">Price:</h4>
              <div class="col-xs-10">
                <input class="form-control" type="text" placeholder="&#8369;{{$product->price}}" id="example-text-input">
              </div>
            </div>
            <div class="form-group row">
              <h4 for="example-text-input" class="col-xs-12 col-form-label">Description:</h4>
              <div class="col-xs-12">
                <textarea id="description" class="form-control" placeholder="{{$product->description}}"
                  rows="5" id="example-text-input"></textarea>
                  <h6 class="pull-right" id="count_message"></h6>
              </div>
            </div>

            <div class="buyNow">
                <a href="#" class="btn btn-primary btn-md btn-block">
                   <span class="shoppingCartIcon glyphicon glyphicon-edit"></span>
                   Update Product Information
                </a>
            </div>
        </form>
        </div>
</div>
<!-- /.container -->

@endsection

@section('customScripts')
@endsection
