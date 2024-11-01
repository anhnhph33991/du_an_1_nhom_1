@extends('layouts.master')
@section('title', 'Create Products')

@section('content')
    <h1>Create Products</h1>
    <a href="{{ routeAdmin('products') }}" class="btn btn-info">Back</a>
    <a href="{{ routeAdmin() }}" class="btn btn-danger">Back dashboard</a>

    <form action="{{ routeAdmin('products/store') }}" method="post">

        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control">
        </div>

        <button class="btn btn-info">Submit</button>
    </form>

@endsection
