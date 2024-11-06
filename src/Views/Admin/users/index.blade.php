@extends('layouts.master')
@section('title')
    User List
@endsection

@section('content')
    <h1>Users Page</h1>
    <a href="{{ routeAdmin('users/create') }}" class="btn btn-success">Create</a>


    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">@</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Is Active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="">
                        <td>{{ $user['id'] }}</td>
                        <td>R1C2</td>
                        <td>R1C3</td>
                        <td>R1C3</td>
                        <td>R1C3</td>
                        <td>R1C3</td>
                        <td>
                            <a href="{{ routeAdmin('users/' . $user['id'] . '/edit') }}" class="btn btn-warning">
                                Edit
                            </a>

                            <a href="javascript:0" onclick="handleDelete({{ $user['id'] }})" class="btn btn-danger">
                                Delete
                            </a>

                            <form hidden action="{{ routeAdmin('users/' . $user['id'] . '/delete') }}" method="POST"
                                id="form-delete-{{ $user['id'] }}">
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ $_ENV['ASSETS'] . 'js/users/index.js' }}">
 </script>
@endsection
