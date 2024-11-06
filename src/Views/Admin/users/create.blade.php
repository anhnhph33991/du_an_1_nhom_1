@extends('layouts.master')
@section('title', 'Create users')

@section('content')
    <h1>Create Users</h1>
    <a href="{{ routeAdmin('users') }}" class="btn btn-info">Back</a>
    <a href="{{ routeAdmin() }}" class="btn btn-danger">Back dashboard</a>

    <form action="{{ routeAdmin('users/store') }}" method="post">

        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{ getOldValue('name') }}">
            <span class="text-danger">
                {{ error('name') }}
            </span>
        </div>

        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" value="{{ getOldValue('email') }}">
            <span class="text-danger">
                {{ error('email') }}
            </span>
        </div>

        <div class="mb-3">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control"  value="{{ getOldValue('password') }}">
            <span class="text-danger">
                {{ error('password') }}
            </span>
        </div>


        {{-- <div class="mb-3">
            <label for="">Avatar</label>
            <input type="file" name="avatar" class="form-control">
        </div> --}}


        <div class="mb-3">
            <label for="">Phone</label>
            <input type="tel" name="phone" class="form-control"  value="{{ getOldValue('phone') }}">
            <span class="text-danger">
                {{ error('phone') }}
            </span>
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="is_active" checked />
                <label class="form-check-label" for=""> Is_Active </label>
                <span class="text-danger">
                    {{ error('is_active') }}
                </span>
            </div>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Role</label>
            <select name="role" class="form-select form-select-lg" name="" id="">
                <option value="0" selected>Member</option>
                <option value="1">Admin</option>
            </select>
            <span class="text-danger">
                {{ error('role') }}
            </span>
        </div>

        <button class="btn btn-info">Submit</button>
    </form>

@endsection
