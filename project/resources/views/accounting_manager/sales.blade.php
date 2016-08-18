@extends('master_layout/master')

@section('customScripts')
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
            <div class="panel panel-default">
              <div class="panel-heading">Sales</div>
              <div class="panel-body">
              <div class="input-group"> <span class="input-group-addon">Filter</span>
                  <input id="filter" type="text" class="form-control" placeholder="Category / Product Name">
              </div>
              <div class="table-responsive">
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="col-md-2">Date</th>
                          <th class="col-md-2">Customer Name<th>
                          <th class="col-md-1">Category<th>
                          <th class="col-md-3">Product Name<th>
                          <th class="col-md-1">Quantity</th>
                          <th class="col-md-1">Price</th>
                          <th class="col-md-2">Total Sales</th>
                        </tr>
                      </thead>
                      <tbody class="searchable">
                        @if (empty($transactions))
                        <tr>
                          <td colspan="10">No Transactions to Display!</td>
                        </tr>
                        @endif
                        @foreach ($transactions as $transaction)
                          <tr>
                            <td colspan="1">{{ date('F d, Y', strtotime($transaction->created_at)) }}</td>
                            <td colspan="1">{{$transaction->idCustomer}}</td>
                            <td colspan="2">{{$transaction->productSold->category}}</td>
                            <td colspan="3">{{$transaction->productSold->name}}</td>
                            <td colspan="1">{{$transaction->quantity}}</td>
                            <td colspan="1">{{$transaction->price}}</td>
                            <td colspan="1">{{$transaction->price * $transaction->quantity}}</td>
                          </tr>
                        @endforeach

                      </tbody>
                </table>
              </div>
            </div>
          </div>
          <div>
      </div>
<!-- /.container -->

@endsection
