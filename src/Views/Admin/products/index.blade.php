@extends('layouts.master')
@section('title')
    Product List
@endsection

@section('content')
    <h1>Product Page</h1>
    <a href="{{ routeAdmin('products/create') }}" class="btn btn-success">Create</a>
@endsection
