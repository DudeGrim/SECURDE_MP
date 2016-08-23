@extends('master_layout/master')

@section('customCSS')
  <style>
    .total{
      font-size: 20px;
    }
  </style>
@endsection
@section('navbarContents')
  <li class="nav-item">
      <a class="nav-link" href="{{route('showCatalog')}}">Catalog
      </a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="{{route('checkoutCart')}}">Cart
      @yield('cartCount')
      </a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="{{route('showTransactions')}}">Transactions
      </a>
  </li>
@endsection
