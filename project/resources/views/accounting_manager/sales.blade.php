@extends('master_layout/master')

@section('customCSS')
  <link href="css/am.css" rel="stylesheet">
@endsection

@section('customScripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
$(document).ready(function () {

  (function ($) {

      $('#filter').keyup(function () {

          var rex = new RegExp($(this).val(), 'i');
          $('.searchable tr').hide();
          $('.searchable tr').filter(function () {
              return rex.test($(this).text());
          }).show();

      })

  }(jQuery));

});
</script>
@endsection

@section('pagecontent')
<div class="container">
        <div class="row">
            <div class="col-md-12">
              <h2>Sales</h2>
              <hr>
              <div class="input-group"> <span class="input-group-addon">Filter</span>
                  <input id="filter" type="text" class="form-control" placeholder="Type here...">
              </div>
              <div class="table-responsive">
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="col-md-3">Date</th>
                          <th class="col-md-3">Item Name</th>
                          <th class="col-md-2">Quantity</th>
                          <th class="col-md-2">Price</th>
                          <th class="col-md-2">Total</th>
                        </tr>
                      </thead>
                      <tbody class="searchable">
                        <tr>
                          <td>July 26, 2016</td>
                          <td>Cool Boots for kids</td>
                          <td>2</td>
                          <td>1000</td>
                          <td>2000</td>
                        </tr>
                        <tr>
                          <td>July 26, 2016</td>
                          <td>Just another flat shoes</td>
                          <td>1</td>
                          <td>800</td>
                          <td>800</td>
                        </tr>
                        <tr>
                          <td>July 26, 2016</td>
                          <td>Sneakers for sneaking</td>
                          <td>1</td>
                          <td>2000</td>
                          <td>2000</td>
                        </tr>
                      </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
<!-- /.container -->

@endsection
