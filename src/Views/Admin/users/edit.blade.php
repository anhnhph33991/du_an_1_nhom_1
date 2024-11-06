@extends('layouts.master')
@section('title')
    Edit User: {{ $user['id'] }}
@endsection

@section('content')
    <h1>Edit User: {{ $user['id'] }}</h1>
    <h1>Name User: {{ $user['name'] }}</h1>
    <h1>Email User: {{ $user['email'] }}</h1>
    <h1>Phone User: {{ $user['phone'] }}</h1>
@endsection
