<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.partials.css')
    <title>@yield('title')</title>
</head>

<body>
    @include('layouts.partials.navbar')
    @include('layouts.components.toastr')
    <div class="container">
        @yield('content')
    </div>

    @include('layouts.partials.script')
    @include('layouts.components.toastr')
    @yield('script')

    {{ unsetSession() }}
</body>

</html>
