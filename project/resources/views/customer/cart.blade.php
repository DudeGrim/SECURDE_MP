@extends('master_layout/customer_master')
@section('customCSS')
<link href="{{asset('css/cart.css')}}" rel="stylesheet">
@endsection
@section('customScripts')

<script src="{{asset('js/customeraddress.js')}}"></script>

@endsection
@section('pagecontent')
<!-- Page Content -->
<div class="container">
   <h2>Checkout</h2>
      <div id="cart" class="panel panel-default">
        <div class="panel-heading">Items in Cart </div>
         <div class="panel-body">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th class="col-md-2">Remove</th>
                     <th class="col-md-3">Name</th>
                     <th class="col-md-1">Size</th>
                     <th class="col-md-1">Quantity</th>
                     <th class="col-md-2">Price</th>
                     <th class="col-md-2">Total</th>
                  </tr>
               </thead>
               <tbody>
                 @foreach(Cart::content() as $item)
                  <tr>
                    <td>
                       <form method="POST" action="{{route('removeFromCart')}}" onsubmit="return confirm('Are you sure, You want to delete this product?');" onsubmit="myFunction()">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="rowID" value="{{ $item->rowId }}">
                          <input type="submit" class="btn btn-block btn-md btn-danger" value="Remove"></input>
                       </form>
                    </td>
                     <td>{{$item->name}}</td>
                     <td>{{$item->options->size}}</td>
                     <td>{{$item->qty}}</td>
                     <!--
                     <td><input type="number" min="1" step="1" name="qty_{{$item->rowId}}" value="{{$item->qty}}" id="quantity" required></td>
                   -->
                     <td>{{$item->price}}</td>
                     <td>{{$item->price * $item->qty}}</td>
                  </tr>
                  @endforeach
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td class="total text-warning"><strong>Subtotal: </strong></td>
                     <td class="total">&#8369;<span id="totalAmount">{{Cart::subtotal()}}</span></td>
                  </tr>
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td class="total text-warning"><strong>Tax: </strong> </td>
                     <td class="total">&#8369;<span id="totalAmount">{{Cart::tax()}}</span></td>
                  </tr>
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td class="total text-warning"><strong>Total: </strong>: </td>
                     <td class="total">&#8369;<span id="totalAmount">{{Cart::total()}}</span></td>
                  </tr>
               </tbody>
            </table>
            <!--
            <div class="form-group row">
               <div class="col-xs-4 pull-right">
                 <input class="btn btn-lg btn-block btn-info" type="submit" value="Recalculate"/>

                 <hr/>
                  <input id="goToAddress" class="btn btn-lg btn-block btn-success" type="submit" value="Shipping Details"/>
                </form>
               </div>
            </div>
          -->
         </div>
      </div>
      <!--
      <div id="shipping">
         If user already has exisiting shipping address, preload it instead
         <div class="panel panel-default">
            <div class="panel-heading">Address</div>
            <div class="panel-body">
               <h3>Shipping</h3>
               <form method="POST" action="{{ route('addNewProduct') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                     <h4 class="col-xs-2 col-form-label">House Number: </h4>
                     <div class="col-xs-4">
                        <input name="_housenumber" id="housenumber" class="form-control" type="text" placeholder="House number" maxlength="45" required>
                        <span id="housenumberchars">45</span>
                     </div>
                     <h4 class="col-xs-2 col-form-label">Street: </h4>
                     <div class="col-xs-4">
                        <input name="_street" id="street" class="form-control" type="text" placeholder="Street" maxlength="45" required>
                        <span id="streetchars">45</span>
                     </div>
                  </div>
                  <div class="form-group row">
                     <h4 class="col-xs-2 col-form-label">Subdivision:</h4>
                     <div class="col-xs-4">
                        <input name="_subdivision" id="subdivision" class="form-control" type="text" placeholder="Subdivision" maxlength="45" required>
                        <span id="subdivisionchars">45</span>
                     </div>
                     <h4  class="col-xs-2 col-form-label">City:</h4>
                     <div class="col-xs-4">
                        <input name="_city" id="city" class="form-control" type="text" placeholder="City" maxlength="45" required>
                        <span id="citychars">45</span>
                     </div>
                  </div>
                  <div class="form-group row">
                     <h4 class="col-xs-2 col-form-label">Postal Code:</h4>
                     <div class="col-xs-4">
                        <input name="_postalcode" id="postalcode" class="form-control" type="Postal Code" placeholder="Street" maxlength="45" required>
                        <span id="postalcodechars">45</span>
                     </div>
                     <h4  class="col-xs-2 col-form-label">Country:</h4>
                     <div class="col-xs-4">
                        <input name="_country" id="country" class="form-control" type="text" placeholder="Country" maxlength="45" required>
                        <span id="countrychars">45</span>
                     </div>
                  </div>
                  <hr/>
                  <h3>Billing</h3>
                  <div class="form-group row">
                     <h4 class="col-xs-2 col-form-label">House Number: </h4>
                     <div class="col-xs-4">
                        <input name="billing_housenumber" id="billing_housenumber" class="form-control" type="text" placeholder="House number" maxlength="45" required>
                        <span id="billing_housenumberchars">45</span>
                     </div>
                     <h4  class="col-xs-2 col-form-label">Street: </h4>
                     <div class="col-xs-4">
                        <input name="billing_street" id="billing_street" class="form-control" type="text" placeholder="Street" maxlength="45" required>
                        <span id="billing_streetchars">45</span>
                     </div>
                  </div>
                  <div class="form-group row">
                     <h4  class="col-xs-2 col-form-label">Subdivision:</h4>
                     <div class="col-xs-4">
                        <input name="billing_subdivision" id="billing_subdivision" class="form-control" type="text" placeholder="Subdivision" maxlength="45" required>
                        <span id="billing_subdivisionchars">45</span>
                     </div>
                     <h4  class="col-xs-2 col-form-label">City:</h4>
                     <div class="col-xs-4">
                        <input name="billing_city" id="billing_city" class="form-control" type="text" placeholder="City" maxlength="45" required>
                        <span id="billing_citychars">45</span>
                     </div>
                  </div>
                  <div class="form-group row">
                     <h4  class="col-xs-2 col-form-label">Postal Code:</h4>
                     <div class="col-xs-4">
                        <input name="billing_postalcode" id="billing_postalcode" class="form-control" type="Postal Code" placeholder="Street" maxlength="45" required>
                        <span id="billing_postalcodechars">45</span>
                     </div>
                     <h4  class="col-xs-2 col-form-label">Country:</h4>
                     <div class="col-xs-4">
                        <input name="billing_country" id="billing_country" class="form-control" type="text" placeholder="Country" maxlength="45" required>
                        <span id="billing_countrychars">45</span>
                     </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-xs-4">
                       <input id="goToCart" class="btn btn-lg btn-block btn-info" type="submit" value="Cart"/>
                    </div>
                     <div class="col-xs-4 pull-right">
                        <input id="goToPayment" class="btn btn-lg btn-block btn-success" type="submit" value="Payment"/>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
    -->
    <form method="POST" action="{{route('buyCart')}}">

      <div id="payment" class="panel panel-default">
        <div class="panel-heading">Credit Card Information</div>
        <div class="panel-body">
        <div class="cardForm">
          <div class="card-wrapper"></div>
          <div class="form-group row">
             <h4  class="col-xs-2 col-form-label">First Name:</h4>
             <div class="col-xs-4">
                <input name="first-name" class="form-control" type="text" placeholder="First Name" maxlength="45" required>
             </div>
             <h4  class="col-xs-2 col-form-label">Last Name:</h4>
             <div class="col-xs-4">
                <input name="last-name" class="form-control" type="text" placeholder="Last Name" maxlength="45" required>
             </div>
          </div>
          <div class="form-group row">
             <h4  class="col-xs-2 col-form-label">Card Number:</h4>
             <div class="col-xs-4">
                <input name="number" class="form-control" type="text" placeholder="Card Number" maxlength="45" required>
             </div>
             <h4  class="col-xs-2 col-form-label">MM / YY:</h4>
             <div class="col-xs-4">
                <input name="expiry" class="form-control" type="text" placeholder="MM / YY" maxlength="45" required>
             </div>
          </div>
          <div class="form-group row">
             <h4  class="col-xs-2 col-form-label">CCV:</h4>
             <div class="col-xs-4">
                <input name="cvc" class="form-control" type="text" placeholder="CCV" maxlength="45" required>
             </div>
          </div>
          </div>
          <div class="form-group row">
            <!--
            <div class="col-xs-4">
                <button id="goToAddress" class="btn btn-lg btn-block btn-info">Address</button>
            </div>
          -->
             <div class="col-xs-4 pull-right">

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  @if(Cart::count() > 0 )
                    <input id="input-button" class="btn btn-lg btn-block btn-success" type="submit" value="Confirm"/>
                  @else
                    <input id="input-button" class="btn btn-lg btn-block btn-success"type="submit" value="Confirm" disabled="true"/>
                  @endif
              </form>
             </div>
          </div>

        </div>
      </div>
</div>
<!-- /.container -->
@endsection

@section('endBodyScripts')
<script src="{{asset('js/jquery.card.js')}}"></script>
<script>

/*for the tab navigation*/
/*
$(function(){
    $('#goToCart').click(function(e){
      e.preventDefault();
        $('#mytabs a[href="#cart"]').tab('show');
    });
    $('#goToAddress').click(function(e){
    	e.preventDefault();
        $('#mytabs a[href="#shipping"]').tab('show');
    });
    $('#goToPayment').click(function(e){
      e.preventDefault();
        $('#mytabs a[href="#payment"]').tab('show');
    });
}); */
/*for the credit card form*/
$('.cardForm').card({
    container: '.card-wrapper',
    width: 280,

    formSelectors: {
        nameInput: 'input[name="first-name"], input[name="last-name"]'
    }
});
</script>
@endsection
