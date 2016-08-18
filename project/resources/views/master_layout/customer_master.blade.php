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
      <a class="nav-link" href="#">Catalog
      </a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="#">Shopping Cart
      </a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="#">Transaction
      </a>
  </li>
@endsection
