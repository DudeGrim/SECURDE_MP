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
      <a class="nav-link" href="{{route('checkoutCart')}}">Checkout
      </a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="#">Transactions
      </a>
  </li>
@endsection
