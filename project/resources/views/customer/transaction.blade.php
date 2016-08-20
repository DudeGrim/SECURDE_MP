@extends('master_layout/customer_master')

@section('pagecontent')
<!-- Page Content -->
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Transactions</div>
          <div class="panel-body table-responsive">
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="col-md-2">Date</th>
                      <th class="col-md-3">Item</th>
                      <th class="col-md-1">Quantity</th>
                      <th class="col-md-1">Price</th>
                      <th class="col-md-2">Total</th>
                      <th class="col-md-2">Review Product</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($transactions as $transaction)
                    <tr>
                      <td>{{ date('F d, Y', strtotime($transaction->created_at)) }}</td>
                      <td>{{$transaction->productSold->name}}</td>
                      <td>{{$transaction->quantity}}</td>
                      <td>{{$transaction->price}}</td>
                      <td>{{$transaction->quantity * $transaction->price}}</td>
                      <td>
                        <a href="writereview/{{$transaction->productSold->idProduct}}" class="btn btn-block btn-info btn-md" role="button">Review</a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
            </table>
      </div>
    </div>
  </div>
<!-- /.container -->
@endsection

@section('customScripts')

@endsection
